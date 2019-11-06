<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseSkeletonModelAssemblerImpl implements GetEntitiesUseCaseSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;
    use UseCaseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $getEntitiesUseCaseFileObject,
        FileObject $getEntitiesUseCaseListItemResponseAssemblerFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseSkeletonModel {
        $skeletonModel = new GetEntitiesUseCaseSkeletonModelImpl();
        $skeletonModel->namespace = $getEntitiesUseCaseFileObject->getNamespace();
        $skeletonModel->shortName = $getEntitiesUseCaseFileObject->getShortName();
        $skeletonModel->entitiesArgument = lcfirst(StringUtility::pluralize($entityFileObject->getShortName()));
        $skeletonModel->entitiesShortName = StringUtility::pluralize($entityFileObject->getShortName());
        $skeletonModel->entityGatewayClassname = $entityGatewayFileObject->getClassName();
        $skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();
        $skeletonModel->entityUseCaseListItemResponseAssemblerClassName = $getEntitiesUseCaseListItemResponseAssemblerFileObject->getClassName(
        );
        $skeletonModel->entityUseCaseListItemResponseAssemblerShortName = $getEntitiesUseCaseListItemResponseAssemblerFileObject->getShortName(
        );
        $skeletonModel->getEntitiesUseCaseRequestClassName = $getEntitiesUseCaseRequestFileObject->getClassName();
        $skeletonModel->getEntitiesUseCaseRequestShortName = $getEntitiesUseCaseRequestFileObject->getShortName();
        $skeletonModel->paginatedCollectionClassName = $this->paginatedCollection;
        $skeletonModel->paginatedCollectionShortName = FileObjectUtility::getShortClassName($this->paginatedCollection);
        $skeletonModel->paginatedUseCaseResponseClassName = $this->paginatedUseCaseResponse;
        $skeletonModel->paginatedUseCaseResponseShortName = FileObjectUtility::getShortClassName(
            $this->paginatedUseCaseResponse
        );
        $skeletonModel->paginationClassName = $this->pagination;
        $skeletonModel->useCaseClassName = $this->useCaseClassName;
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $skeletonModel->useCaseShortName = FileObjectUtility::getShortClassName($this->useCaseClassName);

        return $skeletonModel;
    }
}
