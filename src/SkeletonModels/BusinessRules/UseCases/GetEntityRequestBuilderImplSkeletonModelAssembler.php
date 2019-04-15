<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntityRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestBuilderImplFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestBuilderImplSkeletonModel;
}
