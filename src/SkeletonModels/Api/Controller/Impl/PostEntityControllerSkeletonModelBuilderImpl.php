<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PostEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\useCarbonTrait;

class PostEntityControllerSkeletonModelBuilderImpl implements PostEntityControllerSkeletonModelBuilder
{
    use AbstractControllerClassNameTrait;
    use useCarbonTrait;

    /**
     * @var PostEntityControllerSkeletonModel
     */
    private $skeletonModel;

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
        $this->skeletonModel->createEntityUseCaseShortName = $createEntityUseCaseFileObject->getShortName();
        $this->skeletonModel->createEntityUseCaseClassName = $createEntityUseCaseFileObject->getClassName();

        return $this;
    }

    public function withCreateEntityUseCaseRequestBuilderFileObject(
        FileObject $createEntityUseCaseRequestBuilderFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->createEntityUseCaseRequestBuilderArgument = lcfirst(
            $createEntityUseCaseRequestBuilderFileObject->getShortName()
        );
        $this->skeletonModel->createEntityUseCaseRequestBuilderClassName = $createEntityUseCaseRequestBuilderFileObject->getClassName(
        );
        $this->skeletonModel->createEntityUseCaseRequestBuilderShortName = $createEntityUseCaseRequestBuilderFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): PostEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $this->skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();

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

        return $this;
    }

    public function build(): PostEntityControllerSkeletonModel
    {
        $this->skeletonModel->abstractControllerClassName = $this->abstractControllerClassName;
        $this->skeletonModel->abstractControllerShortName = FileObjectUtility::getShortClassName(
            $this->abstractControllerClassName
        );
        $this->skeletonModel->useCarbon = $this->methodArgumentUseCarbon($this->skeletonModel->postEntityModelMethods);

        return $this->skeletonModel;
    }
}
