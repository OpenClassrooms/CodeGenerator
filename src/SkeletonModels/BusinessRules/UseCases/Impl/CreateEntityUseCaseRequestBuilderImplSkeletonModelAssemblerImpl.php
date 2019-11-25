<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

class CreateEntityUseCaseRequestBuilderImplSkeletonModelAssemblerImpl implements CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestBuilderImplFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseRequestBuilderImplSkeletonModel {
        $skeletonModel = new CreateEntityUseCaseRequestBuilderImplSkeletonModelImpl();

        $skeletonModel->className = $createEntityUseCaseRequestBuilderImplFileObject->getClassName();
        $skeletonModel->methods = $createEntityUseCaseRequestBuilderImplFileObject->getMethods();
        $skeletonModel->shortName = $createEntityUseCaseRequestBuilderImplFileObject->getShortName();
        $skeletonModel->namespace = $createEntityUseCaseRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->createEntityUseCaseRequestClassName = $createEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->createEntityUseCaseRequestShortName = $createEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->createEntityUseCaseRequestBuilderClassName = $createEntityUseCaseRequestBuilderFileObject->getClassName();
        $skeletonModel->createEntityUseCaseRequestBuilderShortName = $createEntityUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->createEntityUseCaseRequestDTOShortName = $createEntityUseCaseRequestDTOFileObject->getShortName();

        return $skeletonModel;
    }
}
