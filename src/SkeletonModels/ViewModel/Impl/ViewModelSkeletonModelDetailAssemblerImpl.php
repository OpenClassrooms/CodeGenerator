<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel\ViewModelSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModel\ViewModelSkeletonModelDetail;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelSkeletonModelDetailAssemblerImpl implements ViewModelSkeletonModelAssembler {

    public function create(FileObject $viewModelFileObject): ViewModelSkeletonModelDetail
    {
        $skeletonModel = new ViewModelSkeletonModelDetailImpl();
        $skeletonModel->className = $viewModelFileObject->getClassName();
        $skeletonModel->namespace = $viewModelFileObject->getNamespace($viewModelFileObject->getClassName());
        $skeletonModel->shortClassName = $viewModelFileObject->getShortClassName();
        $skeletonModel->fields = $viewModelFileObject->getFields();

        return $skeletonModel;
    }
}
