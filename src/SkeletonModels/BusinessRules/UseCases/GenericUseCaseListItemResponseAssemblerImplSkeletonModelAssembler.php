<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerImplFileObject,
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): GenericUseCaseListItemResponseAssemblerImplSkeletonModel;
}
