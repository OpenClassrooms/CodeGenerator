<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class CreateEntityUseCaseRequestSkeletonModelAssemblerImpl implements CreateEntityUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(FileObject $createEntityUseCaseRequestFileObject): CreateEntityUseCaseRequestSkeletonModel
    {
        $skeletonModel = new CreateEntityUseCaseRequestSkeletonModelImpl();

        $skeletonModel->className = $createEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->methods = $createEntityUseCaseRequestFileObject->getMethods();
        $skeletonModel->namespace = $createEntityUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
