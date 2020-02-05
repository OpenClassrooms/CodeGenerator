<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateRequestTraitSkeletonModelAssembler
{
    public function create(FileObject $createRequestTraitFileObject): CreateRequestTraitSkeletonModel;
}
