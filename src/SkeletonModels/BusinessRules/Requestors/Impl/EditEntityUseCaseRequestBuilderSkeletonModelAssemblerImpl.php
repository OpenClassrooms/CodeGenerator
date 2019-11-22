<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class EditEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl implements EditEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $editEntityRequestBuilderFileObject,
        FileObject $editEntityRequestFileObject
    ): EditEntityUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new EditEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->className = $editEntityRequestBuilderFileObject->getClassName();
        $skeletonModel->methods = $editEntityRequestBuilderFileObject->getMethods();
        $skeletonModel->namespace = $editEntityRequestBuilderFileObject->getNamespace();
        $skeletonModel->shortName = $editEntityRequestBuilderFileObject->getShortName();

        $skeletonModel->editEntityRequestShortName = $editEntityRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
