<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestBuilderImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestBuilderImplSkeletonModelAssemblerImpl implements GenericUseCaseRequestBuilderImplSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseRequestBuilderFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject
    ): GenericUseCaseRequestBuilderImplSkeletonModel
    {
        $skeletonModel = new GenericUseCaseRequestBuilderImplSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseRequestBuilderImplFileObject->getShortName();
        $skeletonModel->useCaseClassName = $this->useCaseClassName;
        $skeletonModel->genericUseCaseRequestBuilderClassName = $genericUseCaseRequestBuilderFileObject->getClassName();
        $skeletonModel->genericUseCaseRequestBuilderShortName = $genericUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->genericUseCaseRequestClassName = $genericUseCaseRequestFileObject->getClassName();
        $skeletonModel->genericUseCaseRequestDTOShortName = $genericUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->genericUseCaseRequestShortName = $genericUseCaseRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
