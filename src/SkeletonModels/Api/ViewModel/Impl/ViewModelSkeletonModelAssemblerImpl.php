<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModel\ViewModelSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelSkeletonModelAssemblerImpl implements ViewModelSkeletonModelAssembler
{
    public function create(FileObject $viewModelFileObject): ViewModelSkeletonModel
    {
        $skeletonModel = new ViewModelSkeletonModelImpl();
        $skeletonModel->className = $viewModelFileObject->getClassName();
        $skeletonModel->namespace = $viewModelFileObject->getNamespace();
        $skeletonModel->shortClassName = $viewModelFileObject->getShortName();
        $skeletonModel->fields = $viewModelFileObject->getFields();

        return $skeletonModel;
    }
}
