<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemAssemblerImplSkeletonModelBuilder
{
    public function create(): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withUseCaseResponse(
        FileObject $useCaseResponse
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItem(
        FileObject $viewModelListItem
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItemImpl(
        FileObject $viewModelListItemImpl
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelAssemblerTrait(
        FileObject $viewModelAssemblerTrait
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItemAssemblerImpl(
        FileObject $viewModelListItemAssemblerImpl
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function build(): ViewModelListItemAssemblerImplSkeletonModel;
}
