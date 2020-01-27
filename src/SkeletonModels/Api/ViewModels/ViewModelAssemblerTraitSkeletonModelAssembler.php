<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelAssemblerTraitSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelAssemblerTraitSkeletonModel;
}
