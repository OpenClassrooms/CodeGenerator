<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntityUseCaseSkeletonModelBuilder
{
    public function build(): GetEntityUseCaseSkeletonModel;

    public function create(): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityFileObject(
        FileObject $entityFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseAssemblerFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withGetEntityUseCaseFileObject(
        FileObject $getEntityFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withGetEntityUseCaseRequestFileObject(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;
}
