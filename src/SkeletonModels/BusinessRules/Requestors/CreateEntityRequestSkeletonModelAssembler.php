<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityRequestSkeletonModelAssembler
{
    public function create(FileObject $createEntityRequestFileObject): CreateEntityRequestSkeletonModel;
}
