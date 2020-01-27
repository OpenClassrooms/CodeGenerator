<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface PatchEntityControllerSkeletonModelBuilder
{
    public function create(): PatchEntityControllerSkeletonModelBuilder;

    public function withPatchEntityControllerFileObject(
        FileObject $patchEntityControllerFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEditEntityUseCaseFileObject(
        FileObject $editEntityUseCaseFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEditEntityUseCaseRequestFileObject(
        FileObject $editEntityUseCaseRequestFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEditEntityUseCaseRequestBuilderFileObject(
        FileObject $editEntityUseCaseRequestBuilderFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEntityViewModelDetailFileObject(
        FileObject $entityViewModelDetailFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withPatchEntityModelFileObject(
        FileObject $patchEntityModelFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function withEntityFileObject(
        FileObject $entityFileObject
    ): PatchEntityControllerSkeletonModelBuilder;

    public function build(): PatchEntityControllerSkeletonModel;
}
