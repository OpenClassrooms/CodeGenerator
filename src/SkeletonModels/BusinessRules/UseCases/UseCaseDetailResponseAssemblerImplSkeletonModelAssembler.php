<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface UseCaseDetailResponseAssemblerImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject,
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): UseCaseDetailResponseAssemblerImplSkeletonModel;
}
