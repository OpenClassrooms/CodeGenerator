<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface ViewModelListItemStubSkeletonModelAssembler
{
    public function create(FileObject $stubFileObject, FileObject $viewModelListItemImplFileObject): ViewModelListItemStubSkeletonModel;
}
