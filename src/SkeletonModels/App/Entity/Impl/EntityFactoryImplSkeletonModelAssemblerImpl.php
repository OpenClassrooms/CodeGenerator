<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityFactoryImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityFactoryImplSkeletonModelAssembler;

class EntityFactoryImplSkeletonModelAssemblerImpl implements EntityFactoryImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFactoryFileObject,
        FileObject $entityFactoryImplFileObject,
        FileObject $entityFileObject,
        FileObject $entityImplFileObject
    ): EntityFactoryImplSkeletonModel {
        $skeletonModel = new EntityFactoryImplSkeletonModelImpl();

        $skeletonModel->className = $entityFactoryImplFileObject->getClassName();
        $skeletonModel->namespace = $entityFactoryImplFileObject->getNamespace();
        $skeletonModel->shortName = $entityFactoryImplFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityFactoryClassName = $entityFactoryFileObject->getClassName();
        $skeletonModel->entityFactoryShortName = $entityFactoryFileObject->getShortName();
        $skeletonModel->entityImplShortName = $entityImplFileObject->getShortName();

        return $skeletonModel;
    }
}
