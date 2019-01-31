<?php

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailSkeletonModelAssembler
{
    public function create(FileObject $viewModelDetailFileObject): ViewModelDetailSkeletonModel;
}
