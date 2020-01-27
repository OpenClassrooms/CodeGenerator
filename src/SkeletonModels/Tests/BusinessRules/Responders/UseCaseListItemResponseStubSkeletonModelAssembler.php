<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseStubSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel;
}
