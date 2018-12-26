<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelListItemSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelListItemSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemSkeletonModelAssemblerImpl implements ViewModelListItemSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelFileObject
    ): ViewModelListItemSkeletonModel
    {
        $skeletonModel = new ViewModelListItemSkeletonModelImpl();
        $skeletonModel->namespace = $viewModelListItemFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemFileObject->getShortName();
        $skeletonModel->parentShortName = $viewModelFileObject->getShortName();

        return $skeletonModel;
    }
}
