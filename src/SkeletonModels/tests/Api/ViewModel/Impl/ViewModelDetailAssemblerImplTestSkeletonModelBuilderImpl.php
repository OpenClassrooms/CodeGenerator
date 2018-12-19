<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\ViewModelDetailAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\ViewModelDetailAssemblerImplTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplTestSkeletonModelBuilderImpl implements ViewModelDetailAssemblerImplTestSkeletonModelBuilder
{
    /**
     * @var ViewModelDetailAssemblerImplTestSkeletonModel
     */
    private $skeletonModel;

    public function create(): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {
        $this->skeletonModel = new ViewModelDetailAssemblerImplTestSkeletonModelImpl();

        return $this;
    }

    public function withViewModelDetailAssemblerImpl(
        FileObject $viewModelDetailAssemblerImpl
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {

        $this->skeletonModel->viewModelDetailAssemblerImplShortName = $viewModelDetailAssemblerImpl->getShortName();
        $this->skeletonModel->viewModelDetailAssemblerImplClassName = $viewModelDetailAssemblerImpl->getClassName();

        return $this;
    }

    public function withViewModelDetailTestCase(
        FileObject $viewModelDetailTestCase
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {

        $this->skeletonModel->viewModelDetailTestCaseShortName = $viewModelDetailTestCase->getShortName();
        $this->skeletonModel->viewModelDetailTestCaseClassName = $viewModelDetailTestCase->getClassName();
        $this->skeletonModel->viewModelDetailTestCaseMethod = MethodUtility::getDetailTestCaseAssertMethod(
            $viewModelDetailTestCase->getMethods()
        );

        return $this;
    }

    public function withUseCaseDetailResponseStub(
        FileObject $useCaseDetailResponseStub
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {

        $this->skeletonModel->useCaseDetailResponseStubShortName = $useCaseDetailResponseStub->getShortName();
        $this->skeletonModel->useCaseDetailResponseStubClassName = $useCaseDetailResponseStub->getClassName();

        return $this;
    }

    public function withViewModelDetailStub(
        FileObject $viewModelDetailStub
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {
        $this->skeletonModel->viewModelDetailStubShortName = $viewModelDetailStub->getShortName();
        $this->skeletonModel->viewModelDetailStubClassName = $viewModelDetailStub->getClassName();

        return $this;
    }

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {

        $this->skeletonModel->viewModelDetailAssemblerShortName = $viewModelDetailAssembler->getShortName();
        $this->skeletonModel->viewModelDetailAssemblerClassName = $viewModelDetailAssembler->getClassName();

        return $this;
    }

    public function withViewModelDetailAssemblerImplTest(
        FileObject $viewModelDetailAssemblerImplTest
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder
    {
        $this->skeletonModel->className = $viewModelDetailAssemblerImplTest->getClassName();
        $this->skeletonModel->shortName = $viewModelDetailAssemblerImplTest->getShortName();
        $this->skeletonModel->namespace = $viewModelDetailAssemblerImplTest->getNamespace();

        return $this;
    }

    public function build(): ViewModelDetailAssemblerImplTestSkeletonModel
    {
        return $this->skeletonModel;
    }
}
