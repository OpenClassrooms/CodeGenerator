<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestDTOSkeletonModelAssembler;

class GetEntityUseCaseRequestDTOSkeletonModelAssemblerImpl implements GetEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestDTOSkeletonModel {
        $skeletonModel = new GetEntityUseCaseRequestDTOSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityUseCaseRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->getEntityUseCaseRequestClassName = $getEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->getEntityUseCaseRequestShortName = $getEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $skeletonModel;
    }
}
