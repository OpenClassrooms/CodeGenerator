<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseStubSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel;
}
