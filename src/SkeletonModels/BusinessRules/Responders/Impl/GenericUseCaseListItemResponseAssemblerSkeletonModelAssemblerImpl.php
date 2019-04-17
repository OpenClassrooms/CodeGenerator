<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerSkeletonModelAssemblerImpl implements GenericUseCaseListItemResponseAssemblerSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(
        FileObject $genericUseCaseListItemResponseAssemblerFileObject
    ): GenericUseCaseListItemResponseAssemblerSkeletonModel
    {
        $skeletonModel = new GenericUseCaseListItemResponseAssemblerSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseListItemResponseAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseListItemResponseAssemblerFileObject->getShortName();
        $skeletonModel->paginatedUseCaseResponseClassName = $this->paginatedUseCaseResponse;
        $skeletonModel->paginatedUseCaseResponseShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponse
        );

        return $skeletonModel;
    }
}
