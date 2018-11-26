<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface UseCaseResponseStubSkeletonModelAssembler
{
    public function create(FileObject $responseStubFileObject): UseCaseResponseStubSkeletonModel;
}
