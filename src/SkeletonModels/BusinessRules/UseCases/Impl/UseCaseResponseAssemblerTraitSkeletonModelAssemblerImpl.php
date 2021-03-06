<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseAssemblerTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseAssemblerTraitSkeletonModelAssembler;

class UseCaseResponseAssemblerTraitSkeletonModelAssemblerImpl implements UseCaseResponseAssemblerTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): UseCaseResponseAssemblerTraitSkeletonModel {
        $skeletonModel = new UseCaseResponseAssemblerTraitSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseResponseAssemblerTraitFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseResponseAssemblerTraitFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseResponseClassName = $useCaseResponseFileObject->getClassName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
