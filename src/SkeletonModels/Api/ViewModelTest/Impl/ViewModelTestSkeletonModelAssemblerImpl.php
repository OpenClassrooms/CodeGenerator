<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest\ViewModelTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest\ViewModelTestSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestSkeletonModelAssemblerImpl implements ViewModelTestSkeletonModelAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestSkeletonModel
    {
        $skeletonModel = new ViewModelTestSkeletonModelImpl();
        $skeletonModel->assemblerClassName = $viewModelTest->getClassName();

        return $skeletonModel;
    }

}
