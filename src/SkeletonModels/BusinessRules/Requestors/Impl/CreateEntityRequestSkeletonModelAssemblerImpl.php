<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class CreateEntityRequestSkeletonModelAssemblerImpl implements CreateEntityRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(FileObject $createEntityRequestFileObject): CreateEntityRequestSkeletonModel
    {
        $skeletonModel = new CreateEntityRequestSkeletonModelImpl();

        $skeletonModel->className = $createEntityRequestFileObject->getClassName();
        $skeletonModel->methods = $createEntityRequestFileObject->getMethods();
        $skeletonModel->namespace = $createEntityRequestFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
