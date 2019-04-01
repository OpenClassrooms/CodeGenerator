<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface UseCaseDetailResponseStubSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $entityStubFileObject
    ): UseCaseDetailResponseStubSkeletonModel;
}
