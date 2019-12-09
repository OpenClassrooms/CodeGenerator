<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssemblerImpl implements DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestBuilderImplFileObject,
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestBuilderImplSkeletonModel
    {
        $skeletonModel = new DeleteEntityUseCaseRequestBuilderImplSkeletonModelImpl();
        $skeletonModel->className = $deleteEntityUseCaseRequestBuilderImplFileObject->getClassName();
        $skeletonModel->namespace = $deleteEntityUseCaseRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->shortName = $deleteEntityUseCaseRequestBuilderImplFileObject->getShortName();
        $skeletonModel->deleteEntityUseCaseRequestBuilderClassName = $deleteEntityUseCaseRequestBuilderFileObject->getClassName(
        );
        $skeletonModel->deleteEntityUseCaseRequestBuilderShortName = $deleteEntityUseCaseRequestBuilderFileObject->getShortName(
        );
        $skeletonModel->deleteEntityUseCaseRequestClassName = $deleteEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->deleteEntityUseCaseRequestDTOShortName = $deleteEntityUseCaseRequestDTOFileObject->getShortName(
        );
        $skeletonModel->deleteEntityUseCaseRequestShortName = $deleteEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityIdArgument = NameUtility::creatEntityIdName($deleteEntityUseCaseRequestBuilderImplFileObject->getEntity());
        $skeletonModel->withEntityIdMethod = NameUtility::creatChainedEntityIdMethodName($deleteEntityUseCaseRequestBuilderImplFileObject->getEntity());

        return $skeletonModel;
    }
}
