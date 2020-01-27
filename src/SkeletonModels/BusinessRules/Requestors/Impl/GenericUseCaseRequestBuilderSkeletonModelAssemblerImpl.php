<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class GenericUseCaseRequestBuilderSkeletonModelAssemblerImpl implements GenericUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new GenericUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseRequestBuilderFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $skeletonModel->genericUseCaseRequestBuilderShortName = $genericUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->genericUseCaseRequestShortName = $genericUseCaseRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
