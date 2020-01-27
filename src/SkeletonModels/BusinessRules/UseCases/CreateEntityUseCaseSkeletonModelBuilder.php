<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseSkeletonModelBuilder
{
    public function build(): CreateEntityUseCaseSkeletonModel;

    public function create(): CreateEntityUseCaseSkeletonModelBuilder;

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequest(
        FileObject $createFunctionalEntityRequestFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder;

    public function withEntity(FileObject $entityFileObject): CreateEntityUseCaseSkeletonModelBuilder;

    public function withEntityDetailResponse(
        FileObject $entityUseCaseDetailResponseFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder;

    public function withEntityDetailResponseAssembler(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder;

    public function withEntityFactory(FileObject $entityFactoryFileObject): CreateEntityUseCaseSkeletonModelBuilder;

    public function withEntityGateway(FileObject $entityGatewayFileObject): CreateEntityUseCaseSkeletonModelBuilder;
}
