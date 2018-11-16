<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetail\ViewModelDetailSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailSkeletonModelAssemblerImpl implements ViewModelDetailSkeletonModelAssembler {

    public function create(FileObject $viewModelDetailFileObject): ViewModelDetailSkeletonModel
    {
        $skeletonModel = new ViewModelDetailSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailFileObject->getNamespace();
        $skeletonModel->shortClassName = $viewModelDetailFileObject->getShortClassName();
        $skeletonModel->fields = $viewModelDetailFileObject->getFields();

        return $skeletonModel;
    }
}