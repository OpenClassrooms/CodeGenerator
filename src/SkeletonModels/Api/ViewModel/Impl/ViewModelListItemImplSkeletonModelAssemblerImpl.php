<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelListItemImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelListItemImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemImplSkeletonModelAssemblerImpl implements ViewModelListItemImplSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): ViewModelListItemImplSkeletonModel
    {
        $skeletonModel = new ViewModelListItemImplSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemImplFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemImplFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemImplFileObject->getShortName();
        $skeletonModel->parentClassName = $viewModelListItemFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelListItemFileObject->getShortName();

        return $skeletonModel;
    }
}
