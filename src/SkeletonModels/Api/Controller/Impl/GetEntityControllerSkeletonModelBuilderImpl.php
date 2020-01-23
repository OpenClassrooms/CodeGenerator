<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class GetEntityControllerSkeletonModelBuilderImpl implements GetEntityControllerSkeletonModelBuilder
{
    use AbstractControllerClassNameTrait;

    /**
     * @var GetEntityControllerSkeletonModel
     */
    private $skeletonModel;

    /**
     * @var string
     */
    private $entity;

    public function create(): GetEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntityControllerSkeletonModelImpl();

        return $this;
    }

    public function createGetEntityControllerFileObject(
        FileObject $getEntityControllerFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->className = $getEntityControllerFileObject->getClassName();
        $this->skeletonModel->namespace = $getEntityControllerFileObject->getNamespace();
        $this->skeletonModel->shortName = $getEntityControllerFileObject->getShortName();

        return $this;
    }

    public function createEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionArgument = lcfirst(
            $entityNotFoundExceptionFileObject->getShortName()
        );
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $this->skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();

        return $this;
    }

    public function createEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function createEntityUseCaseResponseFileObject(
        FileObject $entityUseCaseResponseFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseResponseClassName = $entityUseCaseResponseFileObject->getClassName();
        $this->skeletonModel->entityUseCaseResponseShortName = $entityUseCaseResponseFileObject->getShortName();
        $this->entity = $entityUseCaseResponseFileObject->getEntity();

        return $this;
    }

    public function createEntityViewModelFileObject(
        FileObject $entityViewModelFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelClassName = $entityViewModelFileObject->getClassName();
        $this->skeletonModel->entityViewModelShortName = $entityViewModelFileObject->getShortName();

        return $this;
    }

    public function createEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelDetailAssemblerArgument = lcfirst(
            $entityViewModelDetailAssemblerFileObject->getShortName()
        );
        $this->skeletonModel->entityViewModelDetailAssemblerClassName = $entityViewModelDetailAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityViewModelDetailAssemblerShortName = $entityViewModelDetailAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function createGetEntityUseCaseFileObject(
        FileObject $getEntityUseCaseFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseClassName = $getEntityUseCaseFileObject->getClassName();
        $this->skeletonModel->getEntityUseCaseShortName = $getEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function createGetEntityUseCaseRequestBuilderFileObject(
        FileObject $getEntityUseCaseRequestBuilderFileObject
    ): GetEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseRequestBuilderArgument = lcfirst(
            $getEntityUseCaseRequestBuilderFileObject->getShortName()
        );
        $this->skeletonModel->getEntityUseCaseRequestBuilderClassName = $getEntityUseCaseRequestBuilderFileObject->getClassName(
        );
        $this->skeletonModel->getEntityUseCaseRequestBuilderShortName = $getEntityUseCaseRequestBuilderFileObject->getShortName(
        );

        return $this;
    }

    public function build(): GetEntityControllerSkeletonModel
    {
        $this->skeletonModel->abstractControllerClassName = $this->abstractControllerClassName;
        $this->skeletonModel->abstractControllerShortName = FileObjectUtility::getShortClassName($this->abstractControllerClassName);
        $this->skeletonModel->entityArgument = lcfirst($this->entity);
        $this->skeletonModel->entityIdArgument = NameUtility::createEntityIdName($this->entity);
        $this->skeletonModel->getEntityMethod = NameUtility::createGetEntityName($this->entity);
        $this->skeletonModel->withEntityIdMethod = NameUtility::createChainedEntityIdMethodName($this->entity);

        return $this->skeletonModel;
    }
}
