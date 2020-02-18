<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PutEntityModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PutEntityModelSkeletonModelAssembler;

class PutEntityModelSkeletonModelAssemblerImpl implements PutEntityModelSkeletonModelAssembler
{
    public function create(
        FileObject $entityModelTraitFileObject,
        FileObject $putEntityModelFileObject
    ): PutEntityModelSkeletonModel {
        $skeletonModel = new PutEntityModelSkeletonModelImpl();
        $skeletonModel->constants = $putEntityModelFileObject->getConsts();
        $skeletonModel->entityModelTraitShortName = $entityModelTraitFileObject->getShortName();
        $skeletonModel->namespace = $putEntityModelFileObject->getNamespace();
        $skeletonModel->shortName = $putEntityModelFileObject->getShortName();

        return $skeletonModel;
    }
}
