<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestBuilderImplSkeletonModelAssemblerImpl implements GetEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $getEntitiesUseCaseRequestBuilderImplFileObject,
        FileObject $getEntitiesUseCaseRequestBuilderFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseRequestBuilderImplSkeletonModel {
        $skeletonModel = new GetEntitiesUseCaseRequestBuilderImplSkeletonModelImpl();

        $skeletonModel->getEntitiesUseCaseRequestBuilderClassName = $getEntitiesUseCaseRequestBuilderFileObject->getClassName(
        );
        $skeletonModel->getEntitiesUseCaseRequestBuilderShortName = $getEntitiesUseCaseRequestBuilderFileObject->getShortName(
        );
        $skeletonModel->getEntitiesUseCaseRequestClassName = $getEntitiesUseCaseRequestFileObject->getClassName();
        $skeletonModel->getEntitiesUseCaseRequestDTOShortName = $getEntitiesUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->getEntitiesUseCaseRequestShortName = $getEntitiesUseCaseRequestFileObject->getShortName();
        $skeletonModel->namespace = $getEntitiesUseCaseRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->shortName = $getEntitiesUseCaseRequestBuilderImplFileObject->getShortName();

        return $skeletonModel;
    }
}
