<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseDetailResponseFileObject
    ): UseCaseDetailResponseSkeletonModel;
}
