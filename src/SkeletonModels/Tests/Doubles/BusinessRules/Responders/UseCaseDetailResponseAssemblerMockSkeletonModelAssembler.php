<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseAssemblerMockSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): UseCaseDetailResponseAssemblerMockSkeletonModel;
}
