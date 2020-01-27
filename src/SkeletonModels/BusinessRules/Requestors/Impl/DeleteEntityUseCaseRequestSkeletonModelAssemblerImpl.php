<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class DeleteEntityUseCaseRequestSkeletonModelAssemblerImpl implements DeleteEntityUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(FileObject $deleteEntityUseCaseRequestFileObject): DeleteEntityUseCaseRequestSkeletonModel
    {
        $skeletonModel = new DeleteEntityUseCaseRequestSkeletonModelImpl();
        $skeletonModel->className = $deleteEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->namespace = $deleteEntityUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $deleteEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityIdMethodName = NameUtility::creatGetEntityIdName(
            $deleteEntityUseCaseRequestFileObject->getEntity()
        );
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
