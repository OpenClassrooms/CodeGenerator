<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\TestCaseUtility;

class ViewModelListItemAssemblerImplTestSkeletonModelBuilder implements ViewModelListItemAssemblerTestSkeletonModelBuilder
{
    private ViewModelListItemAssemblerTestSkeletonModel $skeletonModel;

    public function build(): ViewModelListItemAssemblerTestSkeletonModel
    {
        return $this->skeletonModel;
    }

    public function create(): ViewModelListItemAssemblerTestSkeletonModelBuilder
    {
        $this->skeletonModel = new ViewModelListItemAssemblerTestSkeletonModelImpl();

        return $this;
    }

    public function withUseCaseListItemResponseStub(
        FileObject $useCaseListItemResponseStub
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseStubShortName = $useCaseListItemResponseStub->getShortName();
        $this->skeletonModel->useCaseListItemResponseStubClassName = $useCaseListItemResponseStub->getClassName();

        return $this;
    }

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemAssemblerShortName = $viewModelListItemAssembler->getShortName();
        $this->skeletonModel->viewModelListItemAssemblerClassName = $viewModelListItemAssembler->getClassName();

        return $this;
    }

    public function withViewModelListItemAssemblerTest(
        FileObject $viewModelListItemAssemblerImplTest
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder {
        $this->skeletonModel->className = $viewModelListItemAssemblerImplTest->getClassName();
        $this->skeletonModel->shortName = $viewModelListItemAssemblerImplTest->getShortName();
        $this->skeletonModel->namespace = $viewModelListItemAssemblerImplTest->getNamespace();

        return $this;
    }

    public function withViewModelListItemStub(
        FileObject $viewModelListItemStub
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemStubShortName = $viewModelListItemStub->getShortName();
        $this->skeletonModel->viewModelListItemStubClassName = $viewModelListItemStub->getClassName();

        return $this;
    }

    public function withViewModelListItemTestCase(
        FileObject $viewModelListItemTestCase
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder {
        $this->skeletonModel->viewModelListItemTestCaseShortName = $viewModelListItemTestCase->getShortName();
        $this->skeletonModel->viewModelListItemTestCaseClassName = $viewModelListItemTestCase->getClassName();
        $this->skeletonModel->viewModelListItemTestCaseMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelListItemTestCase->getShortName()
        );

        return $this;
    }
}
