<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\SecurityClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class DeleteEntityUseCaseSkeletonModelAssemblerImpl implements DeleteEntityUseCaseSkeletonModelAssembler
{
    use UseCaseClassNameTrait;
    use SecurityClassNameTrait;

    public function create(
        FileObject $deleteEntityUseCaseFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject,
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityUseCaseSkeletonModel {
        $skeletonModel = new DeleteEntityUseCaseSkeletonModelImpl();
        $skeletonModel->className = $deleteEntityUseCaseFileObject->getClassName();
        $skeletonModel->shortName = $deleteEntityUseCaseFileObject->getShortName();
        $skeletonModel->namespace = $deleteEntityUseCaseFileObject->getNameSpace();
        $skeletonModel->deleteEntityUseCaseArgument = lcfirst($deleteEntityUseCaseFileObject->getShortName());
        $skeletonModel->deleteEntityUseCaseRequestClassName = $deleteEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->deleteEntityUseCaseRequestShortName = $deleteEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityGatewayArgument = lcfirst($entityGatewayFileObject->getShortName());
        $skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());
        $skeletonModel->entityIdMethod = NameUtility::creatGetEntityIdName($entityFileObject->getShortName());
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->getEntityIdMethod = NameUtility::createGetEntityName($entityFileObject->getShortName());
        $skeletonModel->securityClassName = $this->securityClassName;
        $skeletonModel->transactionClassName = $this->transactionClassName;
        $skeletonModel->useCaseClassName = $this->useCaseClassName;
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
