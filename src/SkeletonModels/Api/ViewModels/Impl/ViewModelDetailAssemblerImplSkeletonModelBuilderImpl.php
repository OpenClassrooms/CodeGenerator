<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelDetailAssemblerImplSkeletonModelBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplSkeletonModelBuilderImpl implements ViewModelDetailAssemblerImplSkeletonModelBuilder
{
    /**
     * @var ViewModelDetailAssemblerImplSkeletonModel
     */
    private $skeletonModel;

    public function create(): ViewModelDetailAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel = new ViewModelDetailAssemblerImplSkeletonModelImpl();

        return $this;
    }

    public function withUseCaseDetailResponse(
        FileObject $useCaseDetailResponse
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder {
        $this->skeletonModel->useCaseDetailResponseClassName = $useCaseDetailResponse->getClassName();
        $this->skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponse->getShortName();
        $this->skeletonModel->useCaseDetailResponseArgument = lcfirst($useCaseDetailResponse->getShortName());

        return $this;
    }

    public function withViewModelDetail(
        FileObject $viewModelDetail
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder {
        $this->skeletonModel->viewModelDetailClassName = $viewModelDetail->getClassName();
        $this->skeletonModel->viewModelDetailShortName = $viewModelDetail->getShortName();

        return $this;
    }

    public function withViewModelDetailImpl(
        FileObject $viewModelDetailImpl
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder {
        $this->skeletonModel->viewModelDetailImplShortName = $viewModelDetailImpl->getShortName();

        return $this;
    }

    public function withViewModelAssemblerTrait(
        FileObject $viewModelAssemblerTrait
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder {
        $this->skeletonModel->viewModelAssemblerTraitClassName = $viewModelAssemblerTrait->getClassName();
        $this->skeletonModel->viewModelAssemblerTraitShortName = $viewModelAssemblerTrait->getShortName();

        return $this;
    }

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder {
        $this->skeletonModel->viewModelDetailAssemblerClassName = $viewModelDetailAssembler->getClassName();
        $this->skeletonModel->viewModelDetailAssemblerShortName = $viewModelDetailAssembler->getShortName();

        return $this;
    }

    public function withViewModelDetailAssemblerImpl(
        FileObject $viewModelDetailAssemblerImpl
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder {
        $this->skeletonModel->className = $viewModelDetailAssemblerImpl->getClassName();
        $this->skeletonModel->namespace = $viewModelDetailAssemblerImpl->getNamespace();
        $this->skeletonModel->shortName = $viewModelDetailAssemblerImpl->getShortName();
        $this->skeletonModel->fields = $viewModelDetailAssemblerImpl->getFields();

        return $this;
    }

    public function build(): ViewModelDetailAssemblerImplSkeletonModel
    {
        return $this->skeletonModel;
    }
}
