<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseDTOSkeletonModelAssemblerImpl implements UseCaseResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseResponseDTOSkeletonModel {
        $skeletonModel = new UseCaseResponseDTOSkeletonModelImpl();
        $skeletonModel->fields = $useCaseResponseDTOFileObject->getFields();
        $skeletonModel->methods = $useCaseResponseDTOFileObject->getMethods();
        $skeletonModel->namespace = $useCaseResponseDTOFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseResponseDTOFileObject->getShortName();
        $skeletonModel->useCaseResponseClassName = $useCaseResponseFileObject->getClassName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
