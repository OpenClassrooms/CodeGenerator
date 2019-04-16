<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseSkeletonModelAssemblerImpl implements GenericUseCaseDetailResponseSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseDetailResponseFileObject
    ): GenericUseCaseDetailResponseSkeletonModel
    {
        $skeletonModel = new GenericUseCaseDetailResponseSkeletonModelImpl();
        $skeletonModel->genericUseCaseDetailMethods = $genericUseCaseDetailResponseFileObject->getMethods();
        $skeletonModel->genericUseCaseResponseShortName = $genericUseCaseResponseFileObject->getShortName();
        $skeletonModel->namespace = $genericUseCaseDetailResponseFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseDetailResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
