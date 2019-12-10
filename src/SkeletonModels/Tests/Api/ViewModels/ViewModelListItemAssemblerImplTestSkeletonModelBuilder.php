<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelListItemAssemblerImplTestSkeletonModelBuilder
{
    public function build(): ViewModelListItemAssemblerImplTestSkeletonModel;

    public function create(): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseStub(
        FileObject $useCaseListItemResponseStub
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemAssemblerImpl(
        FileObject $viewModelListItemAssemblerImpl
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemAssemblerImplTest(
        FileObject $viewModelListItemAssemblerImplTest
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemStub(
        FileObject $viewModelListItemStub
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemTestCase(
        FileObject $viewModelListItemTestCase
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;
}
