<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemStubSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): ViewModelListItemStubSkeletonModel;
}
