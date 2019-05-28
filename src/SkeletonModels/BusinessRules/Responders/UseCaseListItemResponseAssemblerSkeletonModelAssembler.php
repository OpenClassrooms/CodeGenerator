<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
interface UseCaseListItemResponseAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): UseCaseListItemResponseAssemblerSkeletonModel;
}
