<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityStubSkeletonModelAssembler
{
    public function create(
        FileObject $entityImplFileObject,
        FileObject $entityStubFileObject
    ): EntityStubSkeletonModel;
}
