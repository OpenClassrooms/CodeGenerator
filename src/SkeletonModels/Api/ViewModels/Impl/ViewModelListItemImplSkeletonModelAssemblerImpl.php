<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\ViewModelListItemImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemImplSkeletonModelAssemblerImpl implements ViewModelListItemImplSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemImplFileObject
    ): ViewModelListItemImplSkeletonModel {
        $skeletonModel = new ViewModelListItemImplSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemImplFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemImplFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemImplFileObject->getShortName();
        $skeletonModel->parentClassName = $viewModelListItemFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelListItemFileObject->getShortName();

        return $skeletonModel;
    }
}
