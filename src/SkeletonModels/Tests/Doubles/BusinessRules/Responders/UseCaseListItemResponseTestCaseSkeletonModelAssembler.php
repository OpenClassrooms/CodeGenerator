<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseListItemResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): UseCaseListItemResponseTestCaseSkeletonModel;
}
