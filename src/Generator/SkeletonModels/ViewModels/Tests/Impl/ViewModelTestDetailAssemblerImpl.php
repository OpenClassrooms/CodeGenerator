<?php

namespace OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\Tests\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\Tests\ViewModelTestDetail;
use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\Tests\ViewModelTestDetailAssembler;

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
