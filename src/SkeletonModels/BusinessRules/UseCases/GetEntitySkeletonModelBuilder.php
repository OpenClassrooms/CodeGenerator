<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitySkeletonModelBuilder
{
    public function create(): GetEntitySkeletonModelBuilder;

    public function withEntity(
        FileObject $entityFileObject
    ): GetEntitySkeletonModelBuilder;

    public function withEntityGateway(
        FileObject $entityGatewayFileObject
    ): GetEntitySkeletonModelBuilder;

    public function withGetEntity(
        FileObject $getEntityFileObject
    ): GetEntitySkeletonModelBuilder;

    public function withGetEntityRequest(
        FileObject $getEntityRequestFileObject
    ): GetEntitySkeletonModelBuilder;

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): GetEntitySkeletonModelBuilder;

    public function withEntityResponse(
        FileObject $entityResponseFileObject
    ): GetEntitySkeletonModelBuilder;

    public function withEntityNotFoundException(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntitySkeletonModelBuilder;

    public function build(): GetEntitySkeletonModel;
}
