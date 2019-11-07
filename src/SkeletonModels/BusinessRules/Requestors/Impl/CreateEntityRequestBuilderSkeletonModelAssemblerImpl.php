<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class CreateEntityRequestBuilderSkeletonModelAssemblerImpl implements CreateEntityRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestFileObject
    ): CreateEntityRequestBuilderSkeletonModel {
        $skeletonModel = new CreateEntityRequestBuilderSkeletonModelImpl();
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
