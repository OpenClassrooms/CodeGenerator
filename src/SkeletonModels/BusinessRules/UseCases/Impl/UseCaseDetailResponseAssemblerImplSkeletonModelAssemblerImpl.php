<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerImplSkeletonModelAssemblerImpl implements UseCaseDetailResponseAssemblerImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject,
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): UseCaseDetailResponseAssemblerImplSkeletonModel {
        $skeletonModel = new UseCaseDetailResponseAssemblerImplSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseAssemblerImplFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseAssemblerImplFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseAssemblerClassName = $useCaseDetailResponseAssemblerFileObject->getClassName(
        );
        $skeletonModel->useCaseDetailResponseAssemblerImplClassName = $useCaseDetailResponseAssemblerImplFileObject->getClassName(
        );
        $skeletonModel->useCaseDetailResponseAssemblerImplShortName = $useCaseDetailResponseAssemblerImplFileObject->getShortName(
        );
        $skeletonModel->useCaseDetailResponseAssemblerShortName = $useCaseDetailResponseAssemblerFileObject->getShortName(
        );
        $skeletonModel->useCaseDetailResponseClassName = $useCaseDetailResponseFileObject->getClassName();
        $skeletonModel->useCaseDetailResponseDTOShortName = $useCaseDetailResponseDTOFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseTrait = $genericUseCaseTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
