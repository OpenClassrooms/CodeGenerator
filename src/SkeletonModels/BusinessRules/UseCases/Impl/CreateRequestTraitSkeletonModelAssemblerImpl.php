<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateRequestTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateRequestTraitSkeletonModelAssembler;

class CreateRequestTraitSkeletonModelAssemblerImpl implements CreateRequestTraitSkeletonModelAssembler
{
    public function create(FileObject $createRequestTraitFileObject): CreateRequestTraitSkeletonModel
    {
        $skeletonModel = new CreateRequestTraitSkeletonModelImpl();

        $skeletonModel->namespace = $createRequestTraitFileObject->getNamespace();
        $skeletonModel->shortName = $createRequestTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
