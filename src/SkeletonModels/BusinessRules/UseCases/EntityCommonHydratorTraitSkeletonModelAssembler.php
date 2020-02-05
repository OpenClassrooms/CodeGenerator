<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityCommonHydratorTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityCommonHydratorTraitFileObject,
        FileObject $entityFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EntityCommonHydratorTraitSkeletonModel;
}
