<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntitiesControllerSkeletonModelBuilder
{
    /**
     * @param FileObject[] $fileObjects
     */
    public function create(): GetEntitiesControllerSkeletonModelBuilder;

    public function withGetEntitiesControllerFileObject(
        FileObject $getEntitiesControllerFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function withEntityUseCaseResponseFileObject(
        FileObject $entityUseCaseResponseFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function withEntityViewModelListItemAssemblerFileObject(
        FileObject $entityViewModelListItemAssemblerFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function withEntityViewModelListItemFileObject(
        FileObject $entityViewModelListItemFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function withGetEntitiesUseCaseFileObject(
        FileObject $getEntitiesUseCaseFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function withGetEntitiesUseCaseRequestBuilderFileObject(
        FileObject $getEntitiesUseCaseRequestBuilderFileObject
    ): GetEntitiesControllerSkeletonModelBuilder;

    public function build(): GetEntitiesControllerSkeletonModel;
}
