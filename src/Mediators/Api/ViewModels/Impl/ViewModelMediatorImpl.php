<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectFactory;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\ViewModelMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class ViewModelMediatorImpl implements ViewModelMediator
{
    use ViewModelGeneratorsTrait;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var UseCaseResponseFileObjectFactory
     */
    private $useCaseResponseFileObjectFactory;

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    ): void {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }

    /**
     * @return FileObject[]
     */
    public function mediate(array $args = [], array $options = []): array
    {
        $className = $args[Args::CLASS_NAME];

        if (false !== $options[Options::NO_TEST]) {
            $fileObjects = $this->generateSources($className);
        } elseif (false !== $options[Options::TESTS_ONLY]) {
            $entityAndUseCaseResponseFileObjects = $this->generateEntityAndUseCaseResponseTests($className);
            $viewModelTestFileObjects = $this->generateViewModelTests($className);
            $fileObjects = array_merge($entityAndUseCaseResponseFileObjects, $viewModelTestFileObjects);
        } else {
            $sourcesFileObjects = $this->generateSources($className);
            $testsFileObjects = $this->generateEntityAndUseCaseResponseTests($className);
            $viewModelTestFileObjects = $this->generateViewModelTests($className);
            $fileObjects = array_merge($sourcesFileObjects, $testsFileObjects, $viewModelTestFileObjects);
        }
        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateViewModel($className);
        if ($this->isDetailResponseExist($className)) {
            $fileObjects[] = $this->generateViewModelDetail($className);
            $fileObjects[] = $this->generateViewModelDetailImpl($className);
            $fileObjects[] = $this->generateViewModelDetailAssemblerGenerator($className);
            $fileObjects[] = $this->generateViewModelDetailAssemblerImplGenerator($className);
        }
        if ($this->isListItemResponseExist($className)) {
            $fileObjects[] = $this->generateViewModelListItem($className);
            $fileObjects[] = $this->generateViewModelListItemImpl($className);
            $fileObjects[] = $this->generateViewModelListItemAssemblerGenerator($className);
            $fileObjects[] = $this->generateViewModelListItemAssemblerImplGenerator($className);
        }
        $fileObjects[] = $this->generateViewModelAssemblerTraitGenerator($className);
        $fileObjects[] = $this->generateEntityImplGenerator($className);

        return $fileObjects;
    }

    public function isDetailResponseExist(string $className): bool
    {
        $fileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            FileObjectUtility::getDomainFromClassName($className),
            FileObjectUtility::getEntityNameFromClassName($className),
            FileObjectUtility::getBaseNamespaceFromClassName($className)
        );

        return class_exists($fileObject->getClassName());
    }

    public function isListItemResponseExist(string $className): bool
    {
        $fileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            FileObjectUtility::getDomainFromClassName($className),
            FileObjectUtility::getEntityNameFromClassName($className),
            FileObjectUtility::getBaseNamespaceFromClassName($className)
        );

        return interface_exists($fileObject->getClassName());
    }

    /**
     * @return FileObject[]
     */
    private function generateEntityAndUseCaseResponseTests(string $className): array
    {
        $fileObjects[] = $this->generateEntityStub($className);
        $this->isDetailResponseExist($className) ? $fileObjects[] = $this->generateUseCaseDetailResponseStub($className)
            : null;
        $this->isListItemResponseExist($className) ? $fileObjects[] = $this->generateUseCaseListItemResponseStub($className)
            : null;

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateViewModelTests(string $className): array
    {
        $fileObjects[] = $this->generateViewModelTestCase($className);
        if ($this->isListItemResponseExist($className)) {
            $fileObjects[] = $this->generateViewModelListItemStub($className);
            $fileObjects[] = $this->generateViewModelListItemTestCase($className);
            $fileObjects[] = $this->generateViewModelListItemAssemblerImplTest($className);
        }
        if ($this->isDetailResponseExist($className)) {
            $fileObjects[] = $this->generateViewModelDetailTestCase($className);
            $fileObjects[] = $this->generateViewModelDetailStub($className);
            $fileObjects[] = $this->generateViewModelDetailAssemblerImplTest($className);
        }

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
