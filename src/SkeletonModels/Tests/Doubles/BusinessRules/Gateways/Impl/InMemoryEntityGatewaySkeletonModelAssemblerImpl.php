<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class InMemoryEntityGatewaySkeletonModelAssemblerImpl implements InMemoryEntityGatewaySkeletonModelAssembler
{
    private string $entityUtilClassName;

    private string $paginatedCollectionBuilderImplClassName;

    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $inMemoryEntityGatewayFileObject
    ): InMemoryEntityGatewaySkeletonModel {
        $skeletonModel = new InMemoryEntityGatewaySkeletonModelImpl();

        $skeletonModel->namespace = $inMemoryEntityGatewayFileObject->getNamespace();
        $skeletonModel->shortName = $inMemoryEntityGatewayFileObject->getShortName();
        $skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();
        $skeletonModel->entityUtilClassName = $this->entityUtilClassName;
        $skeletonModel->paginatedCollectionBuilderImplClassName = $this->paginatedCollectionBuilderImplClassName;
        $skeletonModel->paginatedCollectionBuilderImplShortName = FileObjectUtility::getShortClassName(
            $this->paginatedCollectionBuilderImplClassName
        );
        $skeletonModel->pluralEntityShortName = lcfirst(StringUtility::pluralize($entityFileObject->getShortName()));

        return $skeletonModel;
    }

    public function setEntityUtilClassName(string $entityUtilClassName): void
    {
        $this->entityUtilClassName = $entityUtilClassName;
    }

    public function setPaginatedCollectionBuilderImplClassName(string $paginatedCollectionBuilderImplClassName): void
    {
        $this->paginatedCollectionBuilderImplClassName = $paginatedCollectionBuilderImplClassName;
    }
}
