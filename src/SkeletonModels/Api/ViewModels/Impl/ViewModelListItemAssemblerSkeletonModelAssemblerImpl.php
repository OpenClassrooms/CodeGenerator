<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemAssemblerSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class ViewModelListItemAssemblerSkeletonModelAssemblerImpl implements ViewModelListItemAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemAssemblerFileObject
    ): ViewModelListItemAssemblerSkeletonModel {
        $skeletonModel = new ViewModelListItemAssemblerSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemAssemblerFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemAssemblerFileObject->getShortName();
        $skeletonModel->useCaseResponseClassName = $useCaseResponseFileObject->getClassName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseArgument = lcfirst($useCaseResponseFileObject->getEntity());
        $skeletonModel->useCaseListItemResponseClassName = $useCaseListItemResponseFileObject->getClassName();
        $skeletonModel->useCaseListItemResponseShortName = $useCaseListItemResponseFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseArgument = lcfirst(
            StringUtility::pluralize(
                $useCaseListItemResponseFileObject->getEntity()
            )
        );
        $skeletonModel->viewModelListItemShortName = $viewModelListItemFileObject->getShortName();

        return $skeletonModel;
    }
}
