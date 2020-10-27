<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelDetailAssemblerTestSkeletonModelBuilder
{
    public function build(): ViewModelDetailAssemblerTestSkeletonModel;

    public function create(): ViewModelDetailAssemblerTestSkeletonModelBuilder;

    public function withUseCaseDetailResponseStub(
        FileObject $useCaseDetailResponseStub
    ): ViewModelDetailAssemblerTestSkeletonModelBuilder;

    public function withViewModelDetailAssembler(
        FileObject $viewModelDetailAssembler
    ): ViewModelDetailAssemblerTestSkeletonModelBuilder;

    public function withViewModelDetailAssemblerTest(
        FileObject $viewModelDetailAssemblerTest
    ): ViewModelDetailAssemblerTestSkeletonModelBuilder;

    public function withViewModelDetailStub(
        FileObject $viewModelDetailStub
    ): ViewModelDetailAssemblerTestSkeletonModelBuilder;
}
