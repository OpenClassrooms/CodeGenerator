<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetFunctionalEntitySkeletonModelBuilder
{
    public function create(): GetFunctionalEntitySkeletonModelBuilder;

    public function withEntity(
        FileObject $entityFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function withEntityGateway(
        FileObject $entityGatewayFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function withGetEntity(
        FileObject $getEntityFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function withGetEntityRequest(
        FileObject $getEntityRequestFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function withEntityResponse(
        FileObject $entityResponseFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function withEntityNotFoundException(
        FileObject $entityNotFoundExceptionFileObject
    ): GetFunctionalEntitySkeletonModelBuilder;

    public function build(): GetFunctionalEntitySkeletonModel;
}
