<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModelMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelMediatorImpl implements ViewModelMediator
{
    use ViewModelGeneratorsTrait;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

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
        $fileObjects[] = $this->generateViewModelDetail($className);
        $fileObjects[] = $this->generateViewModelDetailImpl($className);
        $fileObjects[] = $this->generateViewModelListItem($className);
        $fileObjects[] = $this->generateViewModelListItemImpl($className);
        $fileObjects[] = $this->generateViewModelAssemblerTraitGenerator($className);
        $fileObjects[] = $this->generateViewModelDetailAssemblerGenerator($className);
        $fileObjects[] = $this->generateViewModelDetailAssemblerImplGenerator($className);
        $fileObjects[] = $this->generateViewModelListItemAssemblerGenerator($className);
        $fileObjects[] = $this->generateViewModelListItemAssemblerImplGenerator($className);
        $fileObjects[] = $this->generateEntityImplGenerator($className);

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateEntityAndUseCaseResponseTests(string $className): array
    {
        $fileObjects[] = $this->generateEntityStub($className);
        $fileObjects[] = $this->generateUseCaseDetailResponseStub($className);
        $fileObjects[] = $this->generateUseCaseListItemResponseStub($className);

        return $fileObjects;
    }

    /**
     * @return FileObject[]
     */
    private function generateViewModelTests(string $className): array
    {
        $fileObjects[] = $this->generateViewModelTestCase($className);
        $fileObjects[] = $this->generateViewModelDetailStub($className);
        $fileObjects[] = $this->generateViewModelListItemStub($className);
        $fileObjects[] = $this->generateViewModelDetailTestCase($className);
        $fileObjects[] = $this->generateViewModelListItemTestCase($className);
        $fileObjects[] = $this->generateViewModelDetailAssemblerImplTest($className);
        $fileObjects[] = $this->generateViewModelListItemAssemblerImplTest($className);

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
