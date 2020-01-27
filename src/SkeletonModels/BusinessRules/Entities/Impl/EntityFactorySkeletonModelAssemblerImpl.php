<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities\EntityFactorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities\EntityFactorySkeletonModelAssembler;

class EntityFactorySkeletonModelAssemblerImpl implements EntityFactorySkeletonModelAssembler
{
    public function create(
        FileObject $entityFactoryFileObject,
        FileObject $entityFileObject
    ): EntityFactorySkeletonModel {
        $skeletonModel = new EntityFactorySkeletonModelImpl();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->namespace = $entityFactoryFileObject->getNamespace();
        $skeletonModel->shortName = $entityFactoryFileObject->getShortName();

        return $skeletonModel;
    }
}
