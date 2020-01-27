<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestBuilderImplFileObject,
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestBuilderImplSkeletonModel;
}
