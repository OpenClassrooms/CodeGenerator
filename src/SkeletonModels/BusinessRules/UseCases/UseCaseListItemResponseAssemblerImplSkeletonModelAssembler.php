<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseAssemblerImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseListItemResponseAssemblerFileObject,
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): UseCaseListItemResponseAssemblerImplSkeletonModel;
}
