<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntityControllerSkeletonModelBuilder
{
    public function build(): GetEntityControllerSkeletonModel;

    public function create(): GetEntityControllerSkeletonModelBuilder;

    public function createGetEntityControllerFileObject(
        FileObject $getEntityControllerFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createEntityUseCaseResponseFileObject(
        FileObject $entityUseCaseResponseFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createEntityViewModelFileObject(
        FileObject $entityViewModelFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createGetEntityUseCaseFileObject(
        FileObject $getEntityUseCaseFileObject
    ): GetEntityControllerSkeletonModelBuilder;

    public function createGetEntityUseCaseRequestBuilderFileObject(
        FileObject $getEntityUseCaseRequestBuilderFileObject
    ): GetEntityControllerSkeletonModelBuilder;
}
