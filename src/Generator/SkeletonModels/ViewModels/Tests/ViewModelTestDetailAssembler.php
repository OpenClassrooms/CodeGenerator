<?php

namespace OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\Tests;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestDetailAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestDetail;
}
