<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseListItemResponseDTOSkeletonModel;
}
