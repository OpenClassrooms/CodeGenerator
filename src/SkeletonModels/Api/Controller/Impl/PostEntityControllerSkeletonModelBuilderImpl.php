<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\UseCarbonTrait;

class PostEntityControllerSkeletonModelBuilderImpl implements PostEntityControllerSkeletonModelBuilder
{
    use AbstractControllerClassNameTrait;
    use UseCarbonTrait;

    private PostEntityControllerSkeletonModelImpl $skeletonModel;

    public function create(): PostEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel = new PostEntityControllerSkeletonModelImpl();

        return $this;
    }

    public function withPostEntityControllerFileObject(
        FileObject $postEntityControllerFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->className = $postEntityControllerFileObject->getClassName();
        $this->skeletonModel->namespace = $postEntityControllerFileObject->getNamespace();
        $this->skeletonModel->shortName = $postEntityControllerFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityUseCaseFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->createEntityUseCaseArgument = lcfirst($createEntityUseCaseFileObject->getShortName());
        $this->skeletonModel->createEntityUseCaseShortName = $createEntityUseCaseFileObject->getShortName();
        $this->skeletonModel->createEntityUseCaseClassName = $createEntityUseCaseFileObject->getClassName();

        return $this;
    }

    public function withCreateEntityUseCaseRequestFileObject(
        FileObject $createEntityUseCaseRequestFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->createEntityUseCaseRequestArgument = lcfirst($createEntityUseCaseRequestFileObject->getShortName());
        $this->skeletonModel->createEntityUseCaseRequestShortName = $createEntityUseCaseRequestFileObject->getShortName();
        $this->skeletonModel->createEntityUseCaseRequestClassName = $createEntityUseCaseRequestFileObject->getClassName();

        return $this;
    }

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelDetailAssemblerArgument = lcfirst(
            $entityViewModelDetailAssemblerFileObject->getShortName()
        );
        $this->skeletonModel->entityViewModelDetailAssemblerClassName = $entityViewModelDetailAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityViewModelDetailAssemblerShortName = $entityViewModelDetailAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityViewModelDetailFileObject(
        FileObject $entityViewModelDetailFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelDetailClassName = $entityViewModelDetailFileObject->getClassName();
        $this->skeletonModel->entityViewModelDetailShortName = $entityViewModelDetailFileObject->getShortName();

        return $this;
    }

    public function withPostEntityModelFileObject(
        FileObject $postEntityModelFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->postEntityModelClassName = $postEntityModelFileObject->getClassName();
        $this->skeletonModel->postEntityModelShortName = $postEntityModelFileObject->getShortName();
        $this->skeletonModel->postEntityModelMethods = $postEntityModelFileObject->getMethods();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): PostEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel->createEntityMethod = NameUtility::createCreateEntityMethodName(
            $entityFileObject->getShortName()
        );
        $this->skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());

        return $this;
    }

    public function withRouteAnnotation(string $routeAnnotation): PostEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel->routeAnnotation = $routeAnnotation;

        return $this;
    }

    public function withRouteName(string $routeName): PostEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel->routeName = $routeName;

        return $this;
    }

    public function build(): PostEntityControllerSkeletonModel
    {
        $this->skeletonModel->abstractControllerClassName = $this->abstractControllerClassName;
        $this->skeletonModel->abstractControllerShortName = FileObjectUtility::getShortClassName(
            $this->abstractControllerClassName
        );
        $this->skeletonModel->useCarbon = $this->useCarbon($this->skeletonModel->postEntityModelMethods);

        return $this->skeletonModel;
    }
}
