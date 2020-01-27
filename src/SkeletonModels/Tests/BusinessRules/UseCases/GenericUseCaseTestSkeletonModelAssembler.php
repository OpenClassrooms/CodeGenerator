<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface GenericUseCaseTestSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseFileObject
    ): GenericUseCaseTestSkeletonModel;
}
