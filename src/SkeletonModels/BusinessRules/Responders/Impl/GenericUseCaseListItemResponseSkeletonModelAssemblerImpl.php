<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseSkeletonModelAssemblerImpl implements GenericUseCaseListItemResponseSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseFileObject
    ): GenericUseCaseListItemResponseSkeletonModel
    {
        $skeletonModel = new GenericUseCaseListItemResponseSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseListItemResponseFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseListItemResponseFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseShortName = $genericUseCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
