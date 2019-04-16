<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseAssemblerSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl implements GenericUseCaseDetailResponseAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerFileObject
    ): GenericUseCaseDetailResponseAssemblerSkeletonModel
    {
        $skeletonModel = new GenericUseCaseDetailResponseAssemblerSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseDetailResponseAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseDetailResponseAssemblerFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->genericUseCaseDetailResponseShortName = $genericUseCaseDetailResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
