<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestBuilderImplFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseRequestBuilderImplSkeletonModel;
}
