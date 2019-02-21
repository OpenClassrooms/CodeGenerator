<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface GenericUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseRequestDTOSkeletonModel;
}
