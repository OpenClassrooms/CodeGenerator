<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityNotFoundExceptionSkeletonModelAssembler
{
    public function create(FileObject $entityNotFoundExceptionFileObject): EntityNotFoundExceptionSkeletonModel;
}
