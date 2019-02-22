<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
interface EntityStubSkeletonModelAssembler
{
    public function create(FileObject $entityStubFileObject, FileObject $entityImplFileObject): EntityStubSkeletonModel;
}
