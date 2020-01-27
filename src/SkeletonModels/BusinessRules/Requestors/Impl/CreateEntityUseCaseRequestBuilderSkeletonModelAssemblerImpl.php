<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class CreateEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl implements CreateEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new CreateEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->className = $createEntityUseCaseRequestBuilderFileObject->getClassName();
        $skeletonModel->namespace = $createEntityUseCaseRequestBuilderFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->methods = $createEntityUseCaseRequestBuilderFileObject->getMethods();
        $skeletonModel->createEntityUseCaseRequestShortName = $createEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
