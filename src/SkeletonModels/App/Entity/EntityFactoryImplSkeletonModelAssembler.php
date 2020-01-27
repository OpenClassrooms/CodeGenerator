<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityFactoryImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFactoryFileObject,
        FileObject $entityFactoryImplFileObject,
        FileObject $entityFileObject,
        FileObject $entityImplFileObject
    ): EntityFactoryImplSkeletonModel;
}
