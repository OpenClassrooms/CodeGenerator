<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface GetEntitiesUseCaseSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $getEntitiesUseCaseFileObject,
        FileObject $getEntitiesUseCaseListItemResponseAssemblerFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseSkeletonModel;
}
