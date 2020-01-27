<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityRepositorySkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $entityImplFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $entityRepositoryFileObject
    ): EntityRepositorySkeletonModel;
}
