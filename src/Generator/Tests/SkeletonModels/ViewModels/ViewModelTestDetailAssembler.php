<?php

namespace OpenClassrooms\CodeGenerator\Generator\Tests\SkeletonModels\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelTestDetailAssembler
{
    public function create(FileObject $viewModelTest): ViewModelTestDetail;
}
