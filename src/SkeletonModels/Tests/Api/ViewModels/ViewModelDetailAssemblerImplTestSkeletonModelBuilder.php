<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailAssemblerImplTestSkeletonModelBuilder
{
    public function create(): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelDetailAssemblerImpl(
        FileObject $viewModelDetailAssemblerImpl
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelDetailTestCase(
        FileObject $viewModelDetailTestCase
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseStub(
        FileObject $useCaseDetailResponseStub
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelDetailStub(
        FileObject $viewModelDetailStub
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function withViewModelDetailAssemblerImplTest(
        FileObject $viewModelDetailAssemblerImplTest
    ): ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

    public function build(): ViewModelDetailAssemblerImplTestSkeletonModel;
}
