<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelListItemAssemblerImplSkeletonModelBuilder
{
    public function build(): ViewModelListItemAssemblerImplSkeletonModel;

    public function create(): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withUseCaseResponse(
        FileObject $useCaseResponse
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelAssemblerTrait(
        FileObject $viewModelAssemblerTrait
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItem(
        FileObject $viewModelListItem
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItemAssemblerImpl(
        FileObject $viewModelListItemAssemblerImpl
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;

    public function withViewModelListItemImpl(
        FileObject $viewModelListItemImpl
    ): ViewModelListItemAssemblerImplSkeletonModelBuilder;
}
