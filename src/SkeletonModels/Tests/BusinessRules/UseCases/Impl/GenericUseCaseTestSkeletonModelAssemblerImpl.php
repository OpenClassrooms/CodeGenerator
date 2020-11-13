<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModelAssembler;

class GenericUseCaseTestSkeletonModelAssemblerImpl implements GenericUseCaseTestSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseFileObject
    ): GenericUseCaseTestSkeletonModel {
        $skeletonModel = new GenericUseCaseTestSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseTestFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseTestFileObject->getShortName();
        $skeletonModel->genericUseCaseRequestClassName = $genericUseCaseRequestFileObject->getClassName();
        $skeletonModel->genericUseCaseRequestShortName = $genericUseCaseRequestFileObject->getShortName();
        $skeletonModel->genericUseCaseShortName = $genericUseCaseFileObject->getShortName();
        $skeletonModel->genericUseCaseTestMethod = lcfirst($genericUseCaseFileObject->getShortName());
        $skeletonModel->genericUseCaseClassName = $genericUseCaseFileObject->getClassName();

        return $skeletonModel;
    }
}
