<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): UseCaseDetailResponseTestCaseSkeletonModel;
}
