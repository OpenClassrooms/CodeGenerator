<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface ViewModelDetailTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelTestCaseFileObject
    ): ViewModelDetailTestCaseSkeletonModel;
}
