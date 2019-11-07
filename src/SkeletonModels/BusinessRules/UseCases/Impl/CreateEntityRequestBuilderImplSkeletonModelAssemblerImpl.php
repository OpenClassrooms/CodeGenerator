<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestBuilderImplSkeletonModelAssembler;

class CreateEntityRequestBuilderImplSkeletonModelAssemblerImpl implements CreateEntityRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestBuilderImplFileObject,
        FileObject $createEntityRequestDTOFileObject,
        FileObject $createEntityRequestFileObject
    ): CreateEntityRequestBuilderImplSkeletonModel {
        $skeletonModel = new CreateEntityRequestBuilderImplSkeletonModelImpl();

        $skeletonModel->className = $createEntityRequestBuilderImplFileObject->getClassName();
        $skeletonModel->methods = $createEntityRequestBuilderImplFileObject->getMethods();
        $skeletonModel->shortName = $createEntityRequestBuilderImplFileObject->getShortName();
        $skeletonModel->namespace = $createEntityRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->createEntityRequestClassName = $createEntityRequestFileObject->getClassName();
        $skeletonModel->createEntityRequestShortName = $createEntityRequestFileObject->getShortName();
        $skeletonModel->createEntityRequestBuilderClassName = $createEntityRequestBuilderFileObject->getClassName();
        $skeletonModel->createEntityRequestBuilderShortName = $createEntityRequestBuilderFileObject->getShortName();
        $skeletonModel->createEntityRequestDTOShortName = $createEntityRequestDTOFileObject->getShortName();

        return $skeletonModel;
    }
}
