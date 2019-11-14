<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseRequestSkeletonModelAssembler
{
    public function create(FileObject $getEntitiesUseCaseRequestFileObject): GetEntitiesUseCaseRequestSkeletonModel;
}
