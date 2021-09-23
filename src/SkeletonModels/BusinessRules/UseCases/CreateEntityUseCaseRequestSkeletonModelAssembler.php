<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseRequestSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createRequestTraitFileObject,
        FileObject $entityUseCaseCommonRequestFileObject
    ): CreateEntityUseCaseRequestSkeletonModel;
}
