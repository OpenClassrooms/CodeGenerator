<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelListItemTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): ViewModelListItemTestCaseSkeletonModel;
}
