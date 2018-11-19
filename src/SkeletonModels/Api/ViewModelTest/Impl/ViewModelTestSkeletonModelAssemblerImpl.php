<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTest\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTest\ViewModelTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTest\ViewModelTestSkeletonModelAssembler;

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
