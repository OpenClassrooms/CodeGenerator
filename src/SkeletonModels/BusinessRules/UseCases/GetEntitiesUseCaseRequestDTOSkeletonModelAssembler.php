<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GetEntitiesUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $getEntitiesUseCaseRequestFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): GetEntitiesUseCaseRequestDTOSkeletonModel;
}
