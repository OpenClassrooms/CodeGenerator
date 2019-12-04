<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseDetailResponseDTOSkeletonModel;
}
