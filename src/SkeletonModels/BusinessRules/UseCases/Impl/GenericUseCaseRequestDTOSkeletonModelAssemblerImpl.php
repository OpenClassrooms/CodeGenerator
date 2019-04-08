<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseRequestDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseRequestDTOSkeletonModelAssemblerImpl implements GenericUseCaseRequestDTOSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseRequestDTOSkeletonModel
    {
        $skeletonModel = new GenericUseCaseRequestDTOSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->useCaseClassName = $this->useCaseClassName;
        $skeletonModel->genericUseCaseRequestClassName = $genericUseCaseRequestFileObject->getClassName();
        $skeletonModel->genericUseCaseRequestShortName = $genericUseCaseRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
