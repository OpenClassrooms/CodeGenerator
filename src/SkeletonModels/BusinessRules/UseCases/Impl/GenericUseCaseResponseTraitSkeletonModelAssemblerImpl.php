<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseTraitSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseTraitSkeletonModelAssemblerImpl implements GenericUseCaseResponseTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $genericUseCaseResponseDTOFileObject,
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): GenericUseCaseResponseTraitSkeletonModel
    {
        $skeletonModel = new GenericUseCaseResponseTraitSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseResponseTraitFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseResponseTraitFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseClassName = $genericUseCaseResponseFileObject->getClassName();
        $skeletonModel->genericUseCaseResponseDTOShortName = $genericUseCaseResponseDTOFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseShortName = $genericUseCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
