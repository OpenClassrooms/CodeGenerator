<?php

declare(strict_types=1);

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

    /**
     * @var string
     */
    private $baseNamespace;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $entity;

    /**
     * @return FileObject[]
     */
    public function mediate(array $args = [], array $options = []): array
    {
        $className = $args[Args::CLASS_NAME];

        $this->initFileObjectParameter($className);

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

    private function initFileObjectParameter(string $className): void
    {
        [
            $this->baseNamespace,
            $this->domain,
            $this->entity,
        ] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($className);
    }

    /**
     * @return FileObject[]
     */
    private function generateSources(string $className): array
    {
        $fileObjects[] = $this->generateViewModel($className);
        if ($this->isDetailResponseExist()) {
            $fileObjects[] = $this->generateViewModelDetailGenerator($className);
            $fileObjects[] = $this->generateViewModelDetailImplGenerator($className);
            $fileObjects[] = $this->generateViewModelDetailAssemblerGenerator($className);
        }
        if ($this->isListItemResponseExist()) {
            $fileObjects[] = $this->generateViewModelListItemGenerator($className);
            $fileObjects[] = $this->generateViewModelListItemImplGenerator($className);
            $fileObjects[] = $this->generateViewModelListItemAssemblerGenerator($className);
            $fileObjects[] = $this->generateViewModelListItemAssemblerImplGenerator($className);
        }
        $fileObjects[] = $this->generateViewModelAssemblerTraitGenerator($className);
        $fileObjects[] = $this->generateEntityImplGenerator($className);

        return $fileObjects;
    }

    private function isDetailResponseExist(): bool
    {
        $fileObject = $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE
        );

        return interface_exists($fileObject->getClassName());
    }

    private function createUseCaseResponseFileObject(string $type): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function isListItemResponseExist(): bool
    {
        $fileObject = $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE
        );

        return interface_exists($fileObject->getClassName());
    }

    /**
     * @return FileObject[]
     */
    private function generateEntityAndUseCaseResponseTests(string $className): array
    {
        $fileObjects[] = $this->generateEntityStubGenerator($className);
        if ($this->isDetailResponseExist()) {
            $fileObjects[] = $this->generateUseCaseDetailResponseStubGenerator($className);
        }
        if ($this->isListItemResponseExist()) {
            $fileObjects[] = $this->generateUseCaseListItemResponseStubGenerator($className);
        }

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateViewModelTests(string $className): array
    {
        $fileObjects[] = $this->generateViewModelTestCaseGenerator($className);
        if ($this->isDetailResponseExist()) {
            $fileObjects[] = $this->generateViewModelDetailTestCaseGenerator($className);
            $fileObjects[] = $this->generateViewModelDetailStubGenerator($className);
            $fileObjects[] = $this->generateViewModelDetailAssemblerImplTestGenerator($className);
        }
        if ($this->isListItemResponseExist()) {
            $fileObjects[] = $this->generateViewModelListItemStubGenerator($className);
            $fileObjects[] = $this->generateViewModelListItemTestCaseGenerator($className);
            $fileObjects[] = $this->generateViewModelListItemAssemblerImplTestGenerator($className);
        }

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }

    public function setUseCaseResponseFileObjectFactory(
        UseCaseResponseFileObjectFactory $useCaseResponseFileObjectFactory
    ): void {
        $this->useCaseResponseFileObjectFactory = $useCaseResponseFileObjectFactory;
    }
}
