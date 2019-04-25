<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssemblerImpl implements GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerImplFileObject,
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): GenericUseCaseListItemResponseAssemblerImplSkeletonModel
    {
        $skeletonModel = new GenericUseCaseListItemResponseAssemblerImplSkeletonModelImpl();
        $skeletonModel->namespace = $genericUseCaseListItemResponseAssemblerImplFileObject->getNamespace();
        $skeletonModel->shortName = $genericUseCaseListItemResponseAssemblerImplFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityMethods = $entityFileObject->getMethods();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->genericUseCaseListItemResponseAssemblerClassName = $genericUseCaseListItemResponseAssemblerFileObject->getClassName(
        );
        $skeletonModel->genericUseCaseListItemResponseAssemblerShortName = $genericUseCaseListItemResponseAssemblerFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseListItemResponseClassName = $genericUseCaseListItemResponseFileObject->getClassName(
        );
        $skeletonModel->genericUseCaseListItemResponseDTOShortName = $genericUseCaseListItemResponseDTOFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseListItemResponseShortName = $genericUseCaseListItemResponseFileObject->getShortName(
        );
        $skeletonModel->genericUseCaseResponseTraitShortName = $genericUseCaseResponseTraitFileObject->getShortName();
        $skeletonModel->paginatedUseCaseResponseBuilderArgument = lcfirst(
            FileObjectUtility::getShortClassName(
                $this->paginatedUseCaseResponseBuilder
            )
        );
        $skeletonModel->paginatedUseCaseResponseBuilderClassName = $this->paginatedUseCaseResponseBuilder;
        $skeletonModel->paginatedUseCaseResponseBuilderShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponseBuilder
        );
        $skeletonModel->paginatedUseCaseResponseClassName = $this->paginatedUseCaseResponse;
        $skeletonModel->paginatedUseCaseResponseShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponse
        );

        return $skeletonModel;
    }
}
