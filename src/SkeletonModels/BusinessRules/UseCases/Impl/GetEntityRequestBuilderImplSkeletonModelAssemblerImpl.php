<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderImplSkeletonModelAssemblerImpl implements GetEntityRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestBuilderImplFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestBuilderImplSkeletonModel
    {
        $skeletonModel = new GetEntityRequestBuilderImplSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityRequestBuilderImplFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->getEntityRequestBuilderClassName = $getEntityRequestBuilderFileObject->getClassName();
        $skeletonModel->getEntityRequestBuilderShortName = $getEntityRequestBuilderFileObject->getShortName();
        $skeletonModel->getEntityRequestClassName = $getEntityRequestFileObject->getClassName();
        $skeletonModel->getEntityRequestDTOShortName = $getEntityRequestDTOFileObject->getShortName();
        $skeletonModel->getEntityRequestShortName = $getEntityRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
