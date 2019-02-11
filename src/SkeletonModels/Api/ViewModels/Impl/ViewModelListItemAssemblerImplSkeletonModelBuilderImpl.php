<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerImplSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplSkeletonModelBuilderImpl implements ViewModelListItemAssemblerImplSkeletonModelBuilder
{
    /**
     * @var ViewModelListItemAssemblerImplSkeletonModel
     */
    private $skeletonModel;

    public function create(): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel = new ViewModelListItemAssemblerImplSkeletonModelImpl();

        return $this;
    }

    public function withUseCaseResponse(
        FileObject $useCaseResponse
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel->useCaseResponseClassName = $useCaseResponse->getClassName();
        $this->skeletonModel->useCaseResponseShortName = $useCaseResponse->getShortName();
        $this->skeletonModel->useCaseResponseArgument = lcfirst($useCaseResponse->getEntity());
        $this->skeletonModel->useCaseListItemResponseArgument = lcfirst(StringUtility::pluralize(
            $useCaseResponse->getEntity()
        ));

        return $this;
    }

    public function withViewModelListItem(
        FileObject $viewModelListItem
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel->viewModelListItemClassName = $viewModelListItem->getClassName();
        $this->skeletonModel->viewModelListItemShortName = $viewModelListItem->getShortName();

        return $this;
    }

    public function withViewModelListItemImpl(
        FileObject $viewModelListItemImpl
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel->viewModelListItemImplShortName = $viewModelListItemImpl->getShortName();

        return $this;
    }

    public function withViewModelAssemblerTrait(
        FileObject $viewModelAssemblerTrait
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel->viewModelAssemblerTraitClassName = $viewModelAssemblerTrait->getClassName();
        $this->skeletonModel->viewModelAssemblerTraitShortName = $viewModelAssemblerTrait->getShortName();

        return $this;
    }

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel->viewModelListItemAssemblerClassName = $viewModelListItemAssembler->getClassName();
        $this->skeletonModel->viewModelListItemAssemblerShortName = $viewModelListItemAssembler->getShortName();

        return $this;
    }

    public function withViewModelListItemAssemblerImpl(
        FileObject $viewModelListItemAssemblerImpl
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder
    {
        $this->skeletonModel->namespace = $viewModelListItemAssemblerImpl->getNamespace();
        $this->skeletonModel->shortName = $viewModelListItemAssemblerImpl->getShortName();

        return $this;
    }

    public function build(): ViewModelListItemAssemblerImplSkeletonModel
    {
        return $this->skeletonModel;
    }
}
