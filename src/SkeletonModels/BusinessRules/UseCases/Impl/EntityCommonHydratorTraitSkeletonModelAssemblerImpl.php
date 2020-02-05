<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityCommonHydratorTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityCommonHydratorTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class EntityCommonHydratorTraitSkeletonModelAssemblerImpl implements EntityCommonHydratorTraitSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $entityCommonHydratorTraitFileObject,
        FileObject $entityFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EntityCommonHydratorTraitSkeletonModel {
        $skeletonModel = new EntityCommonHydratorTraitSkeletonModelImpl();

        $skeletonModel->namespace = $entityCommonHydratorTraitFileObject->getNamespace();
        $skeletonModel->shortName = $entityCommonHydratorTraitFileObject->getShortName();
        $skeletonModel->editEntityUseCaseRequestMethods = $editEntityUseCaseRequestFileObject->getMethods();
        $skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
