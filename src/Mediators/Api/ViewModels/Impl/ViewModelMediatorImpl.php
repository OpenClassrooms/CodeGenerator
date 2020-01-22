<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Gateways\FileObject\FileObjectGateway;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\ViewModelMediator;
use OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels\ViewModelOptions;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\Options;

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

        if ($this->isAskNoTest($options)) {
            $fileObjects[] = $this->generateViewModel($className);
            $fileObjects[] = $this->generateViewModelAssemblerTraitGenerator($className);
            $fileObjects[] = $this->generateEntityImplGenerator($className);

            if ($this->isAskDetailOnly($options)) {
                $fileObjects = $this->generateDetail($className, $fileObjects);
            }

            if ($this->isAskListItemOnly($options)) {
                $fileObjects = $this->generateListItem($className, $fileObjects);
            }
        }

        if ($this->isAskTestOnly($options)) {
            $fileObjects[] = $this->generateEntityStub($className);
            $fileObjects[] = $this->generateViewModelTestCase($className);

            if ($this->isAskDetailOnly($options)) {
                $fileObjects = $this->generateDetailTest($className, $fileObjects);
            }

            if ($this->isAskListItemOnly($options)) {
                $fileObjects = $this->generateListItemTest($className, $fileObjects);
            }
        }

        if (false === $options[Options::DUMP]) {
            $this->fileObjectGateway->flush();
        }

        return $fileObjects;
    }

    private function isAskNoTest(array $options): bool
    {
        return !(false !== $options[Options::TESTS_ONLY]);
    }

    private function isAskDetailOnly(array $options): bool
    {
        return !(false !== $options[ViewModelOptions::NO_DETAIL]);
    }

    private function generateDetail(string $className, array $fileObjects): array
    {
        $fileObjects[] = $this->generateViewModelDetail($className);
        $fileObjects[] = $this->generateViewModelDetailImpl($className);
        $fileObjects[] = $this->generateViewModelDetailAssemblerGenerator($className);
        $fileObjects[] = $this->generateViewModelDetailAssemblerImplGenerator($className);

        return $fileObjects;
    }

    private function isAskListItemOnly(array $options): bool
    {
        return !(false !== $options[ViewModelOptions::NO_LIST_ITEM]);
    }

    private function generateListItem(string $className, array $fileObjects): array
    {
        $fileObjects[] = $this->generateViewModelListItem($className);
        $fileObjects[] = $this->generateViewModelListItemImpl($className);
        $fileObjects[] = $this->generateViewModelListItemAssemblerGenerator($className);
        $fileObjects[] = $this->generateViewModelListItemAssemblerImplGenerator($className);

        return $fileObjects;
    }

    private function isAskTestOnly(array $options): bool
    {
        return !(false !== $options[Options::NO_TEST]);
    }

    private function generateDetailTest(string $className, array $fileObjects): array
    {
        $fileObjects[] = $this->generateUseCaseDetailResponseStub($className);
        $fileObjects[] = $this->generateViewModelDetailStub($className);
        $fileObjects[] = $this->generateViewModelDetailTestCase($className);
        $fileObjects[] = $this->generateViewModelDetailAssemblerImplTest($className);

        return $fileObjects;
    }

    private function generateListItemTest(string $className, array $fileObjects): array
    {
        $fileObjects[] = $this->generateUseCaseListItemResponseStub($className);
        $fileObjects[] = $this->generateViewModelListItemStub($className);
        $fileObjects[] = $this->generateViewModelListItemTestCase($className);
        $fileObjects[] = $this->generateViewModelListItemAssemblerImplTest($className);

        return $fileObjects;
    }

    public function setFileObjectGateway(FileObjectGateway $fileObjectGateway): void
    {
        $this->fileObjectGateway = $fileObjectGateway;
    }
}
