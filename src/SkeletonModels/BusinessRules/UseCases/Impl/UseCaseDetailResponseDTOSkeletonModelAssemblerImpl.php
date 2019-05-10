<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseDTOSkeletonModelAssemblerImpl implements UseCaseDetailResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseDetailResponseDTOSkeletonModel
    {
        $skeletonModel = new UseCaseDetailResponseDTOSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseDTOFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseDTOFileObject->getShortName();
        $skeletonModel->fields = $useCaseDetailResponseDTOFileObject->getFields();
        $skeletonModel->methods = $useCaseDetailResponseDTOFileObject->getMethods();
        $skeletonModel->useCaseDetailResponseClassName = $useCaseDetailResponseFileObject->getClassName();
        $skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseDTOShortName = $useCaseResponseDTOFileObject->getShortName();

        return $skeletonModel;
    }
}