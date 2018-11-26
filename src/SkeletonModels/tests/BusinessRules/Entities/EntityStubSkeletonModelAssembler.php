<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface ViewModelStubSkeletonModelAssembler
{
    public function create(FileObject $viewModelStubFileObject, FileObject $viewModelFileObject): ViewModelStubSkeletonModel;
}
