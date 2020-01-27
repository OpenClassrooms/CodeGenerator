<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class EntityGatewaySkeletonModelAssemblerImpl implements EntityGatewaySkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): EntityGatewaySkeletonModel {
        $skeletonModel = new EntityGatewaySkeletonModelImpl();
        $skeletonModel->namespace = $entityGatewayFileObject->getNamespace();
        $skeletonModel->shortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());
        $skeletonModel->paginatedCollectionClassName = $this->paginatedCollection;
        $skeletonModel->paginatedCollectionShortName = FileObjectUtility::getShortClassName($this->paginatedCollection);

        return $skeletonModel;
    }
}
