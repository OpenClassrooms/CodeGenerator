<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface EditEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    public function create(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestBuilderSkeletonModel;
}
