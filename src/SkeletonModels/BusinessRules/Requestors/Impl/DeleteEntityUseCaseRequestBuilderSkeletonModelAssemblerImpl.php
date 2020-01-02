<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class DeleteEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl implements DeleteEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new DeleteEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->className = $deleteEntityUseCaseRequestBuilderFileObject->getClassName();
        $skeletonModel->namespace = $deleteEntityUseCaseRequestBuilderFileObject->getNamespace();
        $skeletonModel->shortName = $deleteEntityUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->deleteEntityUseCaseRequestShortName = $deleteEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $skeletonModel->withEntityIdMethod = NameUtility::createChainedEntityIdMethodName(
            $deleteEntityUseCaseRequestFileObject->getEntity()
        );

        return $skeletonModel;
    }
}
