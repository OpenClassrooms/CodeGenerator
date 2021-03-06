<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelSkeletonModelAssembler
{
    public function create(FileObject $viewModelFileObject): ViewModelSkeletonModel;
}
