<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseListItemResponseSkeletonModel;
}
