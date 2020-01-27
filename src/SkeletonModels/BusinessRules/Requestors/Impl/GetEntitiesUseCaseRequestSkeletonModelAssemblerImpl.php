<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntitiesUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class GetEntitiesUseCaseRequestSkeletonModelAssemblerImpl implements GetEntitiesUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(FileObject $getEntitiesUseCaseRequestFileObject): GetEntitiesUseCaseRequestSkeletonModel
    {
        $skeletonModel = new GetEntitiesUseCaseRequestSkeletonModelImpl();
        $skeletonModel->namespace = $getEntitiesUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $getEntitiesUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
