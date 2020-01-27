<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityFactorySkeletonModelAssembler
{
    public function create(
        FileObject $entityFactoryFileObject,
        FileObject $entityFileObject
    ): EntityFactorySkeletonModel;
}
