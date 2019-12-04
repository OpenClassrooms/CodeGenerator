<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseListItemResponseAssemblerMockSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): UseCaseListItemResponseAssemblerMockSkeletonModel;
}
