<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface ViewModelTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel;
}
