<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\EntityModelTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\EntityModelTraitSkeletonModelAssembler;

class EntityModelTraitSkeletonModelAssemblerImpl implements EntityModelTraitSkeletonModelAssembler
{
    public function create(FileObject $entityModelTraitFileObject): EntityModelTraitSkeletonModel
    {
        $skeletonModel = new EntityModelTraitSkeletonModelImpl();

        $skeletonModel->fields = $entityModelTraitFileObject->getFields();
        $skeletonModel->namespace = $entityModelTraitFileObject->getNamespace();
        $skeletonModel->shortName = $entityModelTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
