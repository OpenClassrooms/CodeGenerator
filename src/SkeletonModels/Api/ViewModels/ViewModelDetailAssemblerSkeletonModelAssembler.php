<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface ViewModelDetailAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelDetailAssemblerFileObject
    ): ViewModelDetailAssemblerSkeletonModel;
}
