<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\TestsSkeleton\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\TestsSkeleton\ViewModelTestSkeletonModelDetail;
use OpenClassrooms\CodeGenerator\SkeletonModels\TestsSkeleton\ViewModelTestSkeletonModelDetailAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestSkeletonModelDetailAssemblerImpl implements ViewModelTestSkeletonModelDetailAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestSkeletonModelDetail
    {
        $skeletonModel = new ViewModelTestSkeletonModelDetailImpl();
        $skeletonModel->assemblerClassName = $viewModelTest->getClassName();

        return $skeletonModel;
    }

}
