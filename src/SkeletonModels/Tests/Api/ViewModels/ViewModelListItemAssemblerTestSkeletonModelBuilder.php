<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelListItemAssemblerTestSkeletonModelBuilder
{
    public function build(): ViewModelListItemAssemblerTestSkeletonModel;

    public function create(): ViewModelListItemAssemblerTestSkeletonModelBuilder;

    public function withUseCaseListItemResponseStub(
        FileObject $useCaseListItemResponseStub
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder;

    public function withViewModelListItemAssembler(
        FileObject $viewModelListItemAssembler
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder;

    public function withViewModelListItemAssemblerTest(
        FileObject $viewModelListItemAssemblerImplTest
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder;

    public function withViewModelListItemStub(
        FileObject $viewModelListItemStub
    ): ViewModelListItemAssemblerTestSkeletonModelBuilder;
}
