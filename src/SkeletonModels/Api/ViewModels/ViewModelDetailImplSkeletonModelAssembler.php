<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelDetailImplSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailImplFileObject
    ): ViewModelDetailImplSkeletonModel;
}
