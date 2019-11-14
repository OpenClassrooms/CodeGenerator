<?php declare(strict_types=1);

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
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestFileObject
    ): CreateEntityUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new CreateEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->className = $createEntityRequestBuilderFileObject->getClassName();
        $skeletonModel->namespace = $createEntityRequestBuilderFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityRequestBuilderFileObject->getShortName();
        $skeletonModel->methods = $createEntityRequestBuilderFileObject->getMethods();
        $skeletonModel->createEntityRequestShortName = $createEntityRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
