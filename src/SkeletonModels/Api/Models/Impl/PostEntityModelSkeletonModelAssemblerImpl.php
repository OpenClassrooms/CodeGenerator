<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PostEntityModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PostEntityModelSkeletonModelAssembler;

class PostEntityModelSkeletonModelAssemblerImpl implements PostEntityModelSkeletonModelAssembler
{
    public function create(
        FileObject $entityModelTraitFileObject,
        FileObject $postEntityModelFileObject
    ): PostEntityModelSkeletonModel {
        $skeletonModel = new PostEntityModelSkeletonModelImpl();
        $skeletonModel->shortName = $postEntityModelFileObject->getShortName();
        $skeletonModel->namespace = $postEntityModelFileObject->getNamespace();
        $skeletonModel->entityModelTraitShortName = $entityModelTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
