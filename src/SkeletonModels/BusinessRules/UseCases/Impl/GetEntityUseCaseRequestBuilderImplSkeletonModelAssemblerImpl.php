<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestBuilderImplSkeletonModelAssemblerImpl implements GetEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestBuilderImplFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderImplSkeletonModel {
        $skeletonModel = new GetEntityUseCaseRequestBuilderImplSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityUseCaseRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityUseCaseRequestBuilderImplFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->getEntityUseCaseRequestBuilderClassName = $getEntityUseCaseRequestBuilderFileObject->getClassName(
        );
        $skeletonModel->getEntityUseCaseRequestBuilderShortName = $getEntityUseCaseRequestBuilderFileObject->getShortName(
        );
        $skeletonModel->getEntityUseCaseRequestClassName = $getEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->getEntityUseCaseRequestDTOShortName = $getEntityUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->getEntityUseCaseRequestShortName = $getEntityUseCaseRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
