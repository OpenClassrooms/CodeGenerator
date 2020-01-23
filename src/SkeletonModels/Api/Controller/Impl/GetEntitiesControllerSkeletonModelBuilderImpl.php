<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\GetEntitiesControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class GetEntitiesControllerSkeletonModelBuilderImpl implements GetEntitiesControllerSkeletonModelBuilder
{
    use AbstractControllerClassNameTrait;
    use UseCaseResponseClassNameTrait;

    /**
     * @var string
     */
    protected $collectionInformationClassName;

    /**
     * private GetEntitiesControllerSkeletonModel
     */
    private $skeletonModel;

    /**
     * @var string
     */
    private $entity;

    public function create(): GetEntitiesControllerSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntitiesControllerSkeletonModelImpl();

        return $this;
    }

    public function withGetEntitiesControllerFileObject(
        FileObject $getEntitiesControllerFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->className = $getEntitiesControllerFileObject->getClassName();
        $this->skeletonModel->namespace = $getEntitiesControllerFileObject->getNamespace();
        $this->skeletonModel->shortName = $getEntitiesControllerFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $this->skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();

        return $this;
    }

    public function withEntityUseCaseResponseFileObject(
        FileObject $entityUseCaseResponseFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseResponseShortName = $entityUseCaseResponseFileObject->getShortName();
        $this->skeletonModel->entityUseCaseResponseClassName = $entityUseCaseResponseFileObject->getClassName();
        $this->entity = $entityUseCaseResponseFileObject->getEntity();

        return $this;
    }

    public function withEntityViewModelListItemAssemblerFileObject(
        FileObject $entityViewModelListItemAssemblerFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelListItemAssemblerArgument = lcfirst(
            $entityViewModelListItemAssemblerFileObject->getShortName()
        );
        $this->skeletonModel->entityViewModelListItemAssemblerClassName = $entityViewModelListItemAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityViewModelListItemAssemblerShortName = $entityViewModelListItemAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityViewModelListItemFileObject(
        FileObject $entityViewModelListItemFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelListItemClassName = $entityViewModelListItemFileObject->getClassName();
        $this->skeletonModel->entityViewModelListItemShortName = $entityViewModelListItemFileObject->getShortName();

        return $this;
    }

    public function withGetEntitiesUseCaseFileObject(
        FileObject $getEntitiesUseCaseFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseClassName = $getEntitiesUseCaseFileObject->getClassName();
        $this->skeletonModel->getEntitiesUseCaseShortName = $getEntitiesUseCaseFileObject->getShortName();

        return $this;
    }

    public function withGetEntitiesUseCaseRequestBuilderFileObject(
        FileObject $getEntitiesUseCaseRequestBuilderFileObject
    ): GetEntitiesControllerSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseRequestBuilderArgument = lcfirst(
            $getEntitiesUseCaseRequestBuilderFileObject->getShortName()
        );

        $this->skeletonModel->getEntitiesUseCaseRequestBuilderClassName = $getEntitiesUseCaseRequestBuilderFileObject->getClassName(
        );
        $this->skeletonModel->getEntitiesUseCaseRequestBuilderShortName = $getEntitiesUseCaseRequestBuilderFileObject->getShortName(
        );

        return $this;
    }

    public function build(): GetEntitiesControllerSkeletonModel
    {
        $this->skeletonModel->abstractControllerClassName = $this->abstractControllerClassName;
        $this->skeletonModel->abstractControllerShortName = FileObjectUtility::getShortClassName(
            $this->abstractControllerClassName
        );
        $this->skeletonModel->collectionInformationClassName = $this->collectionInformationClassName;
        $this->skeletonModel->collectionInformationShortName = FileObjectUtility::getShortClassName(
            $this->collectionInformationClassName
        );
        $this->skeletonModel->paginatedUseCaseResponseClassName = $this->paginatedUseCaseResponse;
        $this->skeletonModel->paginatedUseCaseResponseShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponse
        );
        $this->skeletonModel->entitiesArgument = lcfirst(StringUtility::pluralize($this->entity));
        $this->skeletonModel->getEntitiesMethod = NameUtility::createGetEntityName(
            StringUtility::pluralize($this->entity)
        );

        return $this->skeletonModel;
    }

    public function setCollectionInformationClassName(string $collectionInformationClassName): void
    {
        $this->collectionInformationClassName = $collectionInformationClassName;
    }
}
