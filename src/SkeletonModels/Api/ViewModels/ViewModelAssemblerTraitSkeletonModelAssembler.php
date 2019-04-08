<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelAssemblerTraitSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelAssemblerTraitFileObject,
        FileObject $useCaseResponseFileObject
    ): ViewModelAssemblerTraitSkeletonModel;
}
