<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EntityGatewaySkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): EntityGatewaySkeletonModel;
}
