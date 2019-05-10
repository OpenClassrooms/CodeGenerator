<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseDTOSkeletonModelAssemblerImpl implements UseCaseListItemResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseListItemResponseDTOSkeletonModel
    {
        $skeletonModel = new UseCaseListItemResponseDTOSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseDTOFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseListItemResponseDTOFileObject->getShortName();
        $skeletonModel->fields = $useCaseListItemResponseDTOFileObject->getFields();
        $skeletonModel->methods = $useCaseListItemResponseDTOFileObject->getMethods();
        $skeletonModel->useCaseListItemResponseClassName = $useCaseListItemResponseFileObject->getClassName(
        );
        $skeletonModel->useCaseListItemResponseShortName = $useCaseListItemResponseFileObject->getShortName(
        );
        $skeletonModel->useCaseResponseDTOShortName = $useCaseResponseDTOFileObject->getShortName();

        return $skeletonModel;
    }
}