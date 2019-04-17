<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseSkeletonModelAssemblerImpl implements GenericUseCaseResponseSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(FileObject $genericUseCaseResponseFileObject): GenericUseCaseResponseSkeletonModel
    {
        $skeletonModel = new GenericUseCaseResponseSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseResponseFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseResponseFileObject->getShortName();
        $skeletonModel->genericUseCaseResponseMethods = $genericUseCaseResponseFileObject->getMethods();
        $skeletonModel->useCaseResponseClassName = $this->useCaseResponse;
        $skeletonModel->useCaseResponseShortName = FileObjectUtility::getShortClassName($this->useCaseResponse);

        return $skeletonModel;
    }
}
