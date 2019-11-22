<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class EditEntityUseCaseRequestSkeletonModelAssemblerImpl implements EditEntityUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(FileObject $editEntityUseCaseRequestFileObject): EditEntityUseCaseRequestSkeletonModel
    {
        $skeletonModel = new EditEntityUseCaseRequestSkeletonModelImpl();

        $skeletonModel->className = $editEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->methods = $editEntityUseCaseRequestFileObject->getMethods();
        $skeletonModel->namespace = $editEntityUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $editEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
