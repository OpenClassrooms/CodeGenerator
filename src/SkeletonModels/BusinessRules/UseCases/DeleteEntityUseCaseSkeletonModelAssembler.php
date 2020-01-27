<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface DeleteEntityUseCaseSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityUseCaseFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject,
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityUseCaseSkeletonModel;
}
