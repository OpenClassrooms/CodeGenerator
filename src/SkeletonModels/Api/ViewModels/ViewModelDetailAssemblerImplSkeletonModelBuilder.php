<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelDetailAssemblerImplSkeletonModelBuilder
{
    public function build(): ViewModelDetailAssemblerImplSkeletonModel;

    public function create(): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withUseCaseDetailResponse(
        FileObject $useCaseDetailResponse
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelAssemblerTrait(
        FileObject $viewModelAssemblerTrait
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetail(
        FileObject $viewModelDetail
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetailAssemblerImpl(
        FileObject $viewModelDetailAssemblerImpl
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetailImpl(
        FileObject $viewModelDetailImpl
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;
}
