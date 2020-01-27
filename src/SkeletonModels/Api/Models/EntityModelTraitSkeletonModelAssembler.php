<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityModelTraitSkeletonModelAssembler
{
    public function create(FileObject $entityModelTraitFileObject): EntityModelTraitSkeletonModel;
}
