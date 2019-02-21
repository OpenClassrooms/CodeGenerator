<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface GenericUseCaseTestSkeletonModelAssembler
{
    public function create(
        FileObject $genericUseCaseTestFileObject,
        FileObject $genericUseCaseRequestDTOFileObject,
        FileObject $genericUseCaseRequestBuilderImplFileObject,
        FileObject $genericUseCaseFileObject
    ): GenericUseCaseTestSkeletonModel;
}
