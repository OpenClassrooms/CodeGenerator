<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelListItemAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemFileObject,
        FileObject $viewModelListItemAssemblerFileObject
    ): ViewModelListItemAssemblerSkeletonModel;
}
