<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseResponseDTOFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): UseCaseResponseTraitSkeletonModel;
}
