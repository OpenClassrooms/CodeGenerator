<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GenericUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GenericUseCaseRequestSkeletonModelAssemblerImpl implements GenericUseCaseRequestSkeletonModelAssembler
{
    /**
     * @var string
     */
    private $useCaseClassName;

    /**
     * @var string
     */
    private $useCaseRequestClassName;

    public function create(FileObject $genericUseCaseFileObject): GenericUseCaseRequestSkeletonModel
    {
        $skeletonModel = new GenericUseCaseRequestSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);

        return $skeletonModel;
    }

    public function setUseCaseClassName(string $useCaseClassName): void
    {
        $this->useCaseClassName = $useCaseClassName;
    }

    public function setUseCaseRequestClassName(string $useCaseRequestClassName): void
    {
        $this->useCaseRequestClassName = $useCaseRequestClassName;
    }
}
