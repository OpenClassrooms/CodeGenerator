<?php

namespace OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel\ViewModelDetail;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel\ViewModelDetailAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImpl implements ViewModelDetailAssembler
{

    public function create(FileObject $viewModel): ViewModelDetail
    {
        $skeletonModel = new ViewModelDetailImpl();
        $skeletonModel->className = $viewModel->getClassName();
        $skeletonModel->namespace = $viewModel->getClassName();
        $skeletonModel->shortClassName = $viewModel->getShortClassName();
        $skeletonModel->fields = $viewModel->getFields();

        return $skeletonModel;
    }
}
