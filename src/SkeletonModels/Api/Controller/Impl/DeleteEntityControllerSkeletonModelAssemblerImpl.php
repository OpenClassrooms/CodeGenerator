<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\DeleteEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\DeleteEntityControllerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class DeleteEntityControllerSkeletonModelAssemblerImpl implements DeleteEntityControllerSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityControllerFileObject,
        FileObject $deleteEntityFileObject,
        FileObject $deleteEntityRequestBuilderFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityControllerSkeletonModel {
        $skeletonModel = new DeleteEntityControllerSkeletonModelImpl();
        $skeletonModel->className = $deleteEntityControllerFileObject->getClassName();
        $skeletonModel->namespace = $deleteEntityControllerFileObject->getNamespace();
        $skeletonModel->shortName = $deleteEntityControllerFileObject->getShortName();
        $skeletonModel->deleteEntityClassName = $deleteEntityFileObject->getClassName();
        $skeletonModel->deleteEntityShortName = $deleteEntityFileObject->getShortName();
        $skeletonModel->deleteEntityMethod = lcfirst($deleteEntityFileObject->getShortName());
        $skeletonModel->deleteEntityRequestBuilderArgument = lcfirst(
            $deleteEntityRequestBuilderFileObject->getShortName()
        );
        $skeletonModel->deleteEntityRequestBuilderClassName = $deleteEntityRequestBuilderFileObject->getClassName();
        $skeletonModel->deleteEntityRequestBuilderShortName = $deleteEntityRequestBuilderFileObject->getShortName();
        $skeletonModel->entityIdArgument = NameUtility::createEntityIdName($deleteEntityFileObject->getEntity());
        $skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();
        $skeletonModel->withEntityIdMethod = NameUtility::createChainedEntityIdMethodName(
            $deleteEntityFileObject->getEntity()
        );

        return $skeletonModel;
    }
}
