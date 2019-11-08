<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntitySkeletonModelBuilder
{
    public function create(): CreateEntitySkeletonModelBuilder;

    public function withCreateEntityFileObject(FileObject $createEntityFileObject): CreateEntitySkeletonModelBuilder;

    public function withCreateEntityRequest(
        FileObject $createFunctionalEntityRequestFileObject
    ): CreateEntitySkeletonModelBuilder;

    public function withEntity(FileObject $entityFileObject): CreateEntitySkeletonModelBuilder;

    public function withEntityDetailResponse(
        FileObject $entityDetailResponseFileObject
    ): CreateEntitySkeletonModelBuilder;

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): CreateEntitySkeletonModelBuilder;

    public function withEntityFactory(FileObject $entityFactoryFileObject): CreateEntitySkeletonModelBuilder;

    public function withEntityGateway(FileObject $entityGatewayFileObject): CreateEntitySkeletonModelBuilder;

    public function build(): CreateEntitySkeletonModel;
}
