<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\ViewModelTestDetail;
use OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels\ViewModelTestDetailAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestDetailAssemblerImpl implements ViewModelTestDetailAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestDetail
    {
        $skeletonModel = new ViewModelTestDetailImpl();
        $skeletonModel->assemblerClassName = $viewModelTest->getClassName();

        return $skeletonModel;
    }

}
