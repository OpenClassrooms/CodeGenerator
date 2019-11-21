<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseSkeletonModelBuilder
{
    public function create(): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityClassName(
        FileObject $entityFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityClassNameGateway(
        FileObject $entityGatewayFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withGetEntityUseCase(
        FileObject $getEntityFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withGetEntityUseCaseRequest(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityClassNameDetailResponse(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityClassNameDetailResponseAssembler(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityClassNameResponse(
        FileObject $entityResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function withEntityClassNameNotFoundException(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseSkeletonModelBuilder;

    public function build(): GetEntityUseCaseSkeletonModel;
}
