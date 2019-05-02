<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityUseCaseRequestSkeletonModelAssembler
{
    public function create(
        FileObject $getEntityUseCaseRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityUseCaseRequestSkeletonModel;
}
