<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface InMemoryEntityGatewaySkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $inMemoryEntityGatewayFileObject
    ): InMemoryEntityGatewaySkeletonModel;
}
