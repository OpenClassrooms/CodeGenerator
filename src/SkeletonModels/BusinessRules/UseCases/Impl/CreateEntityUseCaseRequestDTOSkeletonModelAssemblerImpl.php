<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModelAssembler;

class CreateEntityUseCaseRequestDTOSkeletonModelAssemblerImpl implements CreateEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityRequestFileObject,
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityUseCaseRequestDTOSkeletonModel {
        $skeletonModel = new CreateEntityUseCaseRequestDTOSkeletonModelImpl();

        $skeletonModel->className = $createEntityRequestDTOFileObject->getClassName();
        $skeletonModel->fields = $createEntityRequestDTOFileObject->getFields();
        $skeletonModel->methods = $createEntityRequestDTOFileObject->getMethods();
        $skeletonModel->namespace = $createEntityRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityRequestDTOFileObject->getShortName();
        $skeletonModel->createEntityRequestClassName = $createEntityRequestFileObject->getClassName();
        $skeletonModel->createEntityRequestShortName = $createEntityRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
