<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseResponseTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseResponseTestCaseSkeletonModel;
}
