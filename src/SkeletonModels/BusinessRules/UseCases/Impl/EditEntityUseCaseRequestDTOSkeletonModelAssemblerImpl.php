<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestDTOSkeletonModelAssembler;

class EditEntityUseCaseRequestDTOSkeletonModelAssemblerImpl implements EditEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $editEntityUseCaseRequestFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject
    ): EditEntityUseCaseRequestDTOSkeletonModel {
        $skeletonModel = new EditEntityUseCaseRequestDTOSkeletonModelImpl();
        $skeletonModel->editEntityRequestClassName = $editEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->editEntityRequestShortName = $editEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->className = $editEntityUseCaseRequestDTOFileObject->getClassName();
        $skeletonModel->fields = $editEntityUseCaseRequestDTOFileObject->getFields();
        $skeletonModel->methods = $editEntityUseCaseRequestDTOFileObject->getMethods();
        $skeletonModel->namespace = $editEntityUseCaseRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $editEntityUseCaseRequestDTOFileObject->getShortName();

        return $skeletonModel;
    }
}
