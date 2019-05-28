<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseSkeletonModelBuilder
{
    public function create(): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntity(
        FileObject $entityFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityGateway(
        FileObject $entityGatewayFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withGetEntityUseCase(
        FileObject $getEntityFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withGetEntityUseCaseRequest(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityDetailResponse(
        FileObject $entityDetailResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityResponse(
        FileObject $entityResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityNotFoundException(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function build(): GetEntityUseCaseSkeletonModel;
}
