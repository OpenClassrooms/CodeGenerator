<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface DeleteEntityUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestDTOSkeletonModel;
}
