<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModelMediator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelMediatorImpl implements ViewModelMediator
{
    use GeneratorsTrait;

    /**
     * @var FileObjectGateway
     */
    private $fileObjectGateway;

    /**
     * @var GeneratorRequest
     */
    private $generatorRequestBuilder;

    public function mediate(array $args = [], array $options = [])
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
     * @param FileObject[] $fileObjects
     *
     * @return FileObject[]
     */
    private function generateViewModelTests($className): array
    {
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
