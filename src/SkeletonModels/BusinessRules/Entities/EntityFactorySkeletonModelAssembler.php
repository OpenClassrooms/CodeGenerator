<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

interface EntityFactorySkeletonModelAssembler
{
    public function create(
        FileObject $entityFactoryFileObject,
        FileObject $entityFileObject
    ): EntityFactorySkeletonModel;
}
