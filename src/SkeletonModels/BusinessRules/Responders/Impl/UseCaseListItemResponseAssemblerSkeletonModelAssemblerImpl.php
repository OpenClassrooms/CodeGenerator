<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class UseCaseListItemResponseAssemblerSkeletonModelAssemblerImpl implements UseCaseListItemResponseAssemblerSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): UseCaseListItemResponseAssemblerSkeletonModel {
        $skeletonModel = new UseCaseListItemResponseAssemblerSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseListItemResponseAssemblerFileObject->getShortName();
        $skeletonModel->paginatedCollectionClassName = $this->paginatedCollection;
        $skeletonModel->paginatedCollectionShortName = FileObjectUtility::getShortClassName(
            $this->paginatedCollection
        );
        $skeletonModel->paginatedUseCaseResponseClassName = $this->paginatedUseCaseResponse;
        $skeletonModel->paginatedUseCaseResponseShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponse
        );

        return $skeletonModel;
    }
}
