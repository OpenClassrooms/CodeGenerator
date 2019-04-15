<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestDTOSkeletonModelAssemblerImpl implements GetEntityRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestDTOSkeletonModel
    {
        $skeletonModel = new GetEntityRequestDTOSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityRequestDTOFileObject->getShortName();
        $skeletonModel->getEntityRequestClassName = $getEntityRequestFileObject->getClassName();
        $skeletonModel->getEntityRequestShortName = $getEntityRequestFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $skeletonModel;
    }
}
