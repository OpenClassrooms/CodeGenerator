<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class DeleteEntityUseCaseRequestDTOSkeletonModelAssemblerImpl implements DeleteEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestDTOSkeletonModel {
        $skeletonModel = new DeleteEntityUseCaseRequestDTOSkeletonModelImpl();
        $skeletonModel->className = $deleteEntityUseCaseRequestDTOFileObject->getClassName();
        $skeletonModel->namespace = $deleteEntityUseCaseRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $deleteEntityUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->deleteEntityUseCaseRequestClassName = $deleteEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->deleteEntityUseCaseRequestShortName = $deleteEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityIdArgument = NameUtility::createEntityIdName(
            $deleteEntityUseCaseRequestDTOFileObject->getEntity()
        );
        $skeletonModel->getEntityIdMethod = NameUtility::creatGetEntityIdName(
            $deleteEntityUseCaseRequestDTOFileObject->getEntity()
        );

        return $skeletonModel;
    }
}
