<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerTestSkeletonModelBuilder;

final class ViewModelDetailAssemblerTestSkeletonModelBuilderImpl implements ViewModelDetailAssemblerTestSkeletonModelBuilder
{
    private ViewModelDetailAssemblerTestSkeletonModel $skeletonModel;

    public function build(): ViewModelDetailAssemblerTestSkeletonModel
    {
        return $this->skeletonModel;
    }

    public function create(): ViewModelDetailAssemblerTestSkeletonModelBuilderImpl
    {
        $this->skeletonModel = new ViewModelDetailAssemblerTestSkeletonModelImpl();

        return $this;
    }

    public function withUseCaseDetailResponseStub(
        FileObject $useCaseDetailResponseStub
    ): ViewModelDetailAssemblerTestSkeletonModelBuilderImpl {
        $this->skeletonModel->useCaseDetailResponseStubShortName = $useCaseDetailResponseStub->getShortName();
        $this->skeletonModel->useCaseDetailResponseStubClassName = $useCaseDetailResponseStub->getClassName();

        return $this;
    }

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerTestSkeletonModelBuilderImpl {
        $this->skeletonModel->viewModelDetailAssemblerShortName = $viewModelDetailAssembler->getShortName();
        $this->skeletonModel->viewModelDetailAssemblerClassName = $viewModelDetailAssembler->getClassName();

        return $this;
    }

    public function withViewModelDetailAssemblerTest(
        FileObject $viewModelDetailAssemblerTest
    ): ViewModelDetailAssemblerTestSkeletonModelBuilderImpl {
        $this->skeletonModel->className = $viewModelDetailAssemblerTest->getClassName();
        $this->skeletonModel->shortName = $viewModelDetailAssemblerTest->getShortName();
        $this->skeletonModel->namespace = $viewModelDetailAssemblerTest->getNamespace();

        return $this;
    }

    public function withViewModelDetailStub(
        FileObject $viewModelDetailStub
    ): ViewModelDetailAssemblerTestSkeletonModelBuilderImpl {
        $this->skeletonModel->viewModelDetailStubShortName = $viewModelDetailStub->getShortName();
        $this->skeletonModel->viewModelDetailStubClassName = $viewModelDetailStub->getClassName();

        return $this;
    }
}
