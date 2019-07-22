<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityRepositorySkeletonModelAssemblerImpl implements EntityRepositorySkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityRepositoryFileObject
    ): EntityRepositorySkeletonModel {
        $skeletonModel = new EntityRepositorySkeletonModelImpl();
        $skeletonModel->namespace = $entityRepositoryFileObject->getNamespace();
        $skeletonModel->shortName = $entityRepositoryFileObject->getShortName();
        $skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $skeletonModel;
    }
}
