<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseDTOSkeletonModelAssemblerImpl implements GenericUseCaseListItemResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseListItemResponseDTOSkeletonModel
    {
        $skeletonModel = new GenericUseCaseListItemResponseDTOSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseListItemResponseDTOFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseListItemResponseDTOFileObject->getShortName();
        $skeletonModel->fields = $genericUseCaseListItemResponseDTOFileObject->getFields();
        $skeletonModel->methods = $genericUseCaseListItemResponseDTOFileObject->getMethods();
        $skeletonModel->genericUseCaseListItemResponseClassName = $genericUseCaseListItemResponseFileObject->getClassName(
        );
        $skeletonModel->genericUseCaseListItemResponseShortName = $genericUseCaseListItemResponseFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseResponseDTOShortName = $genericUseCaseResponseDTOFileObject->getShortName();

        return $skeletonModel;
    }
}
