<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityImplSkeletonModelAssembler
{
    public function create(FileObject $entityImplFileObject, FileObject $entityFileObject): EntityImplSkeletonModel;
}
