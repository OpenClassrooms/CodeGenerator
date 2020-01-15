<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PatchEntityModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PatchEntityModelSkeletonModelAssembler;

class PatchEntityModelSkeletonModelAssemblerImpl implements PatchEntityModelSkeletonModelAssembler
{
    public function create(
        FileObject $entityModelTraitFileObject,
        FileObject $patchEntityModelFileObject
    ): PatchEntityModelSkeletonModel {
        $skeletonModel = new PatchEntityModelSkeletonModelImpl();
        $skeletonModel->constants = $patchEntityModelFileObject->getConsts();
        $skeletonModel->fields = $patchEntityModelFileObject->getFields();
        $skeletonModel->namespace = $patchEntityModelFileObject->getNamespace();
        $skeletonModel->shortName = $patchEntityModelFileObject->getShortName();
        $skeletonModel->entityModelTraitShortName = $entityModelTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
