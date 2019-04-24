<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseDetailResponseDTOSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseDetailResponseDTOSkeletonModel;
}
