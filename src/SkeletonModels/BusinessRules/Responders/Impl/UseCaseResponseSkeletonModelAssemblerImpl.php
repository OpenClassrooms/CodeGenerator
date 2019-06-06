<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseSkeletonModelAssemblerImpl implements UseCaseResponseSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(FileObject $useCaseResponseFileObject): UseCaseResponseSkeletonModel
    {
        $skeletonModel = new UseCaseResponseSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseResponseFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseMethods = $useCaseResponseFileObject->getMethods();
        $skeletonModel->useCaseResponseClassName = $this->useCaseResponse;
        $skeletonModel->useCaseResponseShortName = FileObjectUtility::getShortClassName($this->useCaseResponse);

        return $skeletonModel;
    }
}
