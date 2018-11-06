<?php

namespace OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\ViewModel;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailAssembler
{
    public function create(FileObject $viewModel): ViewModelDetail;
}
