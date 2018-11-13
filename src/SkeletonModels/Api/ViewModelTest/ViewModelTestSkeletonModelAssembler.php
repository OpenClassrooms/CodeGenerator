<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestSkeletonModelAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestSkeletonModel;
}
