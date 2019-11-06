<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseSkeletonModelAssemblerImpl implements UseCaseListItemResponseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseListItemResponseSkeletonModel {
        $skeletonModel = new UseCaseListItemResponseSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseListItemResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
