<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssemblerImpl implements GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerImplFileObject,
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): GenericUseCaseDetailResponseAssemblerImplSkeletonModel
    {
        $skeletonModel = new GenericUseCaseDetailResponseAssemblerImplSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseDetailResponseAssemblerImplFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseDetailResponseAssemblerImplFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->genericUseCaseDetailResponseAssemblerClassName = $genericUseCaseDetailResponseAssemblerFileObject->getClassName(
        );
        $skeletonModel->genericUseCaseDetailResponseAssemblerImplClassName = $genericUseCaseDetailResponseAssemblerImplFileObject->getClassName(
        );
        $skeletonModel->genericUseCaseDetailResponseAssemblerImplShortName = $genericUseCaseDetailResponseAssemblerImplFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseDetailResponseAssemblerShortName = $genericUseCaseDetailResponseAssemblerFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseDetailResponseClassName = $genericUseCaseDetailResponseFileObject->getClassName();
        $skeletonModel->genericUseCaseDetailResponseDTOShortName = $genericUseCaseDetailResponseDTOFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseDetailResponseShortName = $genericUseCaseDetailResponseFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseTrait = $genericUseCaseTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
