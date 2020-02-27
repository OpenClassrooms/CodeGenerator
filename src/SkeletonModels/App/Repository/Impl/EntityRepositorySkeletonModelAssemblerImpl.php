<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class EntityRepositorySkeletonModelAssemblerImpl implements EntityRepositorySkeletonModelAssembler
{
    /**
     * @var string
     */
    private $paginatedCollectionFactoryClassName;

    public function create(
        FileObject $entityFileObject,
        FileObject $entityImplFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $entityRepositoryFileObject
    ): EntityRepositorySkeletonModel {
        $skeletonModel = new EntityRepositorySkeletonModelImpl();
        $skeletonModel->namespace = $entityRepositoryFileObject->getNamespace();
        $skeletonModel->shortName = $entityRepositoryFileObject->getShortName();
        $skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityImplClassName = $entityImplFileObject->getClassName();
        $skeletonModel->entityImplShortName = $entityImplFileObject->getShortName();
        $skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();
        $skeletonModel->entityFirstLetter = lcfirst($entityFileObject->getShortName()[0]);
        $skeletonModel->paginatedCollectionFactoryArgument = lcfirst(
            FileObjectUtility::getShortClassName($this->paginatedCollectionFactoryClassName)
        );
        $skeletonModel->paginatedCollectionFactoryClassName = $this->paginatedCollectionFactoryClassName;
        $skeletonModel->paginatedCollectionFactoryShortName = FileObjectUtility::getShortClassName(
            $this->paginatedCollectionFactoryClassName
        );

        return $skeletonModel;
    }

    public function setPaginatedCollectionFactoryClassName(string $paginatedCollectionFactoryClassName): void
    {
        $this->paginatedCollectionFactoryClassName = $paginatedCollectionFactoryClassName;
    }
}
