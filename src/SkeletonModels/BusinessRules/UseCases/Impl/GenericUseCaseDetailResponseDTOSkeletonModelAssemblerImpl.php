<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseDTOSkeletonModelAssemblerImpl implements GenericUseCaseDetailResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseDetailResponseDTOSkeletonModel
    {
        $skeletonModel = new GenericUseCaseDetailResponseDTOSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseDetailResponseDTOFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseDetailResponseDTOFileObject->getShortName();
        $skeletonModel->fields = $genericUseCaseDetailResponseDTOFileObject->getFields();
        $skeletonModel->methods = $genericUseCaseDetailResponseDTOFileObject->getMethods();
        $skeletonModel->genericUseCaseDetailResponseClassName = $genericUseCaseDetailResponseFileObject->getClassName();
        $skeletonModel->genericUseCaseDetailResponseShortName = $genericUseCaseDetailResponseFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseDTOShortName = $genericUseCaseResponseDTOFileObject->getShortName();

        return $skeletonModel;
    }
}
