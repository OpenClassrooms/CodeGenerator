<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModelAssembler;

class CreateEntityUseCaseRequestDTOSkeletonModelAssemblerImpl implements CreateEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject
    ): CreateEntityUseCaseRequestDTOSkeletonModel {
        $skeletonModel = new CreateEntityUseCaseRequestDTOSkeletonModelImpl();

        $skeletonModel->className = $createEntityUseCaseRequestDTOFileObject->getClassName();
        $skeletonModel->fields = $createEntityUseCaseRequestDTOFileObject->getFields();
        $skeletonModel->methods = $createEntityUseCaseRequestDTOFileObject->getMethods();
        $skeletonModel->namespace = $createEntityUseCaseRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->createEntityUseCaseRequestClassName = $createEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->createEntityUseCaseRequestShortName = $createEntityUseCaseRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
