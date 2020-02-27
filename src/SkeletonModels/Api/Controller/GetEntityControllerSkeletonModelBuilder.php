<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntityControllerSkeletonModelBuilder
{
    public function build(): GetEntityControllerSkeletonModel;

    public function create(): GetEntityControllerSkeletonModelBuilder;

    public function withCreateGetEntityControllerFileObject(
        FileObject $getEntityControllerFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withCreateEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withCreateEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withCreateEntityViewModelFileObject(
        FileObject $entityViewModelFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withCreateEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withCreateGetEntityUseCaseFileObject(
        FileObject $getEntityUseCaseFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withCreateGetEntityUseCaseRequestBuilderFileObject(
        FileObject $getEntityUseCaseRequestBuilderFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function withRouteAnnotation(string $routeAnnotation): GetEntityControllerSkeletonModelBuilder;
}
