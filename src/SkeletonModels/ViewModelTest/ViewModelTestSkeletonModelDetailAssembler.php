<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\ViewModelTest;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestSkeletonModelDetailAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestSkeletonModelDetail;
}
