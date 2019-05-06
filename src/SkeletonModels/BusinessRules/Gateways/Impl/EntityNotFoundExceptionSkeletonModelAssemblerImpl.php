<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityNotFoundExceptionSkeletonModelAssemblerImpl implements EntityNotFoundExceptionSkeletonModelAssembler
{
    public function create(FileObject $entityNotFoundExceptionFileObject): EntityNotFoundExceptionSkeletonModel
    {
        $skeletonModel = new EntityNotFoundExceptionSkeletonModelImpl();
        $skeletonModel->namespace = $entityNotFoundExceptionFileObject->getNamespace();
        $skeletonModel->shortName = $entityNotFoundExceptionFileObject->getShortName();

        return $skeletonModel;
    }
}
