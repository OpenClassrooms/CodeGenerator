<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface DeleteEntityUseCaseTestSkeletonModelBuilder
{
    public function create(): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withDeleteEntityUseCaseFileObject(
        FileObject $deleteEntityUseCaseFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withDeleteEntityUseCaseTestFileObject(
        FileObject $deleteEntityUseCaseTestFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withDeleteEntityUseCaseRequestFileObject(
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withDeleteEntityUseCaseRequestBuilderImplFileObject(
        FileObject $deleteEntityUseCaseRequestBuilderImplFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withDeleteEntityUseCaseRequestDTOFileObject(
        FileObject $deleteEntityUseCaseRequestDTOFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder;

    public function build(): DeleteEntityUseCaseTestSkeletonModel;
}
