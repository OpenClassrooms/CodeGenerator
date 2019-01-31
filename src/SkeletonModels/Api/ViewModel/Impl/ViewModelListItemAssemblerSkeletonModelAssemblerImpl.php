<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelListItemAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelListItemAssemblerSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerSkeletonModelAssemblerImpl implements ViewModelListItemAssemblerSkeletonModelAssembler
{
    use SkeletonAssemblerUtility;

    public function create(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemAssemblerFileObject
    ): ViewModelListItemAssemblerSkeletonModel
    {
        $skeletonModel = new ViewModelListItemAssemblerSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemAssemblerFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemAssemblerFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseClassName = $useCaseListItemResponseFileObject->getClassName();
        $skeletonModel->useCaseListItemResponseShortName = $useCaseListItemResponseFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseArgument = $this->getUseCaseListItemResponseArgument(
            $useCaseListItemResponseFileObject->getEntity()
        );
        $skeletonModel->viewModelListItemShortName = $viewModelListItemFileObject->getShortName();

        return $skeletonModel;
    }
}
