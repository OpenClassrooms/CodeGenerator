<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;

class GetEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl implements GetEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new GetEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->shortName = $getEntityUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->namespace = $getEntityUseCaseRequestBuilderFileObject->getNamespace();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->getEntityUseCaseRequest = $getEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
