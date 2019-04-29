<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseDTOSkeletonModelAssemblerImpl implements GenericUseCaseResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseResponseDTOSkeletonModel
    {
        $skeletonModel = new GenericUseCaseResponseDTOSkeletonModelImpl();
        $skeletonModel->fields = $genericUseCaseResponseDTOFileObject->getFields();
        $skeletonModel->methods = $genericUseCaseResponseDTOFileObject->getMethods();
        $skeletonModel->namespace = $genericUseCaseResponseDTOFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseResponseDTOFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseClassName = $genericUseCaseResponseFileObject->getClassName();
        $skeletonModel->genericUseCaseResponseShortName = $genericUseCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
