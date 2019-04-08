<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GenericUseCaseRequestDTOSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestFileObject
    ): GenericUseCaseRequestDTOSkeletonModel;
}
