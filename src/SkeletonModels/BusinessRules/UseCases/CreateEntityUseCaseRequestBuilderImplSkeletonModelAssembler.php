<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityRequestBuilderFileObject,
        FileObject $createEntityRequestBuilderImplFileObject,
        FileObject $createEntityRequestDTOFileObject,
        FileObject $createEntityRequestFileObject
    ): CreateEntityUseCaseRequestBuilderImplSkeletonModel;
}
