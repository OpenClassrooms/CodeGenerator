<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EditEntityUseCaseSkeletonModelBuilder
{
    public function build(): EditEntityUseCaseSkeletonModel;

    public function create(): EditEntityUseCaseSkeletonModelBuilder;

    public function withEditEntityUseCaseFileObject(
        FileObject $editEntityUseCaseFileObject
    ): EditEntityUseCaseSkeletonModelBuilder;

    public function withEditEntityUseCaseRequestFileObject(
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): EditEntityUseCaseSkeletonModelBuilder;

    public function withEntityGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): EditEntityUseCaseSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): EditEntityUseCaseSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseAssemblerFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): EditEntityUseCaseSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): EditEntityUseCaseSkeletonModelBuilder;
}
