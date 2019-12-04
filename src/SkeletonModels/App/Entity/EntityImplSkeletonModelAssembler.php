<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityImplSkeletonModelAssembler
{
    public function create(FileObject $entityImplFileObject, FileObject $entityFileObject): EntityImplSkeletonModel;
}
