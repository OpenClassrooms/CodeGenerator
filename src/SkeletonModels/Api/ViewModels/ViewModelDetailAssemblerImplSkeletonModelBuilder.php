<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailAssemblerImplSkeletonModelBuilder
{
    public function create(): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withUseCaseDetailResponse(
        FileObject $useCaseDetailResponse
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetail(
        FileObject $viewModelDetail
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetailImpl(
        FileObject $viewModelDetailImpl
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelAssemblerTrait(
        FileObject $viewModelAssemblerTrait
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function withViewModelDetailAssemblerImpl(
        FileObject $viewModelDetailAssemblerImpl
    ): ViewModelDetailAssemblerImplSkeletonModelBuilder;

    public function build(): ViewModelDetailAssemblerImplSkeletonModel;
}
