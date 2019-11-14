<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseTraitSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseTraitSkeletonModelAssemblerImpl implements UseCaseResponseTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseResponseDTOFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): UseCaseResponseTraitSkeletonModel {
        $skeletonModel = new UseCaseResponseTraitSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseResponseTraitFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseResponseTraitFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseResponseClassName = $useCaseResponseFileObject->getClassName();
        $skeletonModel->useCaseResponseDTOShortName = $useCaseResponseDTOFileObject->getShortName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
