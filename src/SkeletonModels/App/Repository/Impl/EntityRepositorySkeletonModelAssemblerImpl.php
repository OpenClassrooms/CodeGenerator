<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityRepositorySkeletonModelAssemblerImpl implements EntityRepositorySkeletonModelAssembler
{
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
        $skeletonModel->entityIdArgument = NameUtility::creatEntityIdName($entityFileObject->getShortName());
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();

        return $skeletonModel;
    }
}
