<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class EditEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl implements EditEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestBuilderSkeletonModel {
        $skeletonModel = new EditEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->className = $editEntityUseCaseRequestBuilderFileObject->getClassName();
        $skeletonModel->methods = $editEntityUseCaseRequestBuilderFileObject->getMethods();
        $skeletonModel->namespace = $editEntityUseCaseRequestBuilderFileObject->getNamespace();
        $skeletonModel->shortName = $editEntityUseCaseRequestBuilderFileObject->getShortName();

        $skeletonModel->entityIdMethodName = NameUtility::createChainedEntityIdMethodName(
            $editEntityUseCaseRequestBuilderFileObject->getEntity()
        );
        $skeletonModel->editEntityUseCaseRequestShortName = $editEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }
}
