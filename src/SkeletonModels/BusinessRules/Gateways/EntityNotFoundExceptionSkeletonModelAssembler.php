<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface EntityNotFoundExceptionSkeletonModelAssembler
{
    public function create(FileObject $entityNotFoundExceptionFileObject): EntityNotFoundExceptionSkeletonModel;
}
