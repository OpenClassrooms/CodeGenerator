<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerImplSkeletonModelAssemblerImpl implements UseCaseListItemResponseAssemblerImplSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseListItemResponseAssemblerFileObject,
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): UseCaseListItemResponseAssemblerImplSkeletonModel {
        $skeletonModel = new UseCaseListItemResponseAssemblerImplSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseAssemblerImplFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseListItemResponseAssemblerImplFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseAssemblerClassName = $useCaseListItemResponseAssemblerFileObject->getClassName(
        );
        $skeletonModel->useCaseListItemResponseAssemblerShortName = $useCaseListItemResponseAssemblerFileObject->getShortName(
        );
        $skeletonModel->useCaseListItemResponseClassName = $useCaseListItemResponseFileObject->getClassName();
        $skeletonModel->useCaseListItemResponseDTOShortName = $useCaseListItemResponseDTOFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseShortName = $useCaseListItemResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseAssemblerTraitShortName = $useCaseResponseAssemblerTraitFileObject->getShortName(
        );
        $skeletonModel->paginatedUseCaseResponseBuilderArgument = lcfirst(
            FileObjectUtility::getShortClassName(
                $this->paginatedUseCaseResponseBuilder
            )
        );
        $skeletonModel->paginatedUseCaseResponseBuilderClassName = $this->paginatedUseCaseResponseBuilder;
        $skeletonModel->paginatedUseCaseResponseBuilderShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponseBuilder
        );

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
