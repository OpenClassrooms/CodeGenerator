<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface PostEntityControllerSkeletonModelBuilder
{
    public function create(): PostEntityControllerSkeletonModelBuilder;

    public function withPostEntityControllerFileObject(
        FileObject $postEntityControllerFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityUseCaseFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestFileObject(
        FileObject $createEntityUseCaseRequestFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityViewModelDetailFileObject(
        FileObject $entityViewModelDetailFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withPostEntityModelFileObject(
        FileObject $postEntityModelFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): PostEntityControllerSkeletonModelBuilder;

    public function withRouteAnnotation(string $routeAnnotation): PostEntityControllerSkeletonModelBuilder;

    public function withRouteName(string $routeName): PostEntityControllerSkeletonModelBuilder;

    public function build(): PostEntityControllerSkeletonModel;
}
