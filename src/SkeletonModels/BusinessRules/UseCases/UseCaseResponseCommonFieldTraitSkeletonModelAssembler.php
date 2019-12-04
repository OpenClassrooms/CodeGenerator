<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseResponseCommonFieldTraitSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseResponseCommonFieldTraitSkeletonModel;
}
