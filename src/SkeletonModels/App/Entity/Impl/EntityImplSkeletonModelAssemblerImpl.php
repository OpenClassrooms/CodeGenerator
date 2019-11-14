<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityImplSkeletonModelAssemblerImpl implements EntityImplSkeletonModelAssembler
{
    public function create(FileObject $entityImplFileObject, FileObject $entityFileObject): EntityImplSkeletonModel
    {
        $skeletonModel = new EntityImplSkeletonModelImpl();
        $skeletonModel->className = $entityImplFileObject->getClassName();
        $skeletonModel->namespace = $entityImplFileObject->getNamespace();
        $skeletonModel->shortName = $entityImplFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();

        return $skeletonModel;
    }
}

