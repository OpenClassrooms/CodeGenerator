<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemAssemblerImplTestSkeletonModelBuilder
{
    public function create(): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemAssemblerImpl(
        FileObject $viewModelListItemAssemblerImpl
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemTestCase(
        FileObject $viewModelListItemTestCase
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseStub(
        FileObject $useCaseListItemResponseStub
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemStub(
        FileObject $viewModelListItemStub
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelListItemAssemblerImplTest(
        FileObject $viewModelListItemAssemblerImplTest
    ): ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

    public function build(): ViewModelListItemAssemblerImplTestSkeletonModel;
}
