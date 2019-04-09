<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GenericUseCaseTestSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseTestSkeletonModelAssemblerImpl implements GenericUseCaseTestSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseFileObject
    ): GenericUseCaseTestSkeletonModel {
        $skeletonModel = new GenericUseCaseTestSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseTestFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseTestFileObject->getShortName();
        $skeletonModel->genericUseCaseRequestDTOClassName = $genericUseCaseRequestDTOFileObject->getClassName();
        $skeletonModel->genericUseCaseRequestDTOShortName = $genericUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->genericUseCaseRequestBuilderImplClassName = $genericUseCaseRequestBuilderImplFileObject->getClassName(
        );
        $skeletonModel->genericUseCaseRequestBuilderImplShortName = $genericUseCaseRequestBuilderImplFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseShortName = $genericUseCaseFileObject->getShortName();
        $skeletonModel->genericUseCaseTestMethod =  lcfirst($genericUseCaseFileObject->getShortName());
        $skeletonModel->genericUseCaseClassName = $genericUseCaseFileObject->getClassName();

        return $skeletonModel;
    }
}
