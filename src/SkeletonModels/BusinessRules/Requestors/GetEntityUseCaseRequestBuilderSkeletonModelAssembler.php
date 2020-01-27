<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderSkeletonModel;
}
