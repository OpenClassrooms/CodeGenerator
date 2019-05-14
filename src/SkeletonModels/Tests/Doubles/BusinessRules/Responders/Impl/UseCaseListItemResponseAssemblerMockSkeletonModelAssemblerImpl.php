<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerMockSkeletonModelAssemblerImpl implements UseCaseListItemResponseAssemblerMockSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseAssemblerMockFileObject
    ): UseCaseListItemResponseAssemblerMockSkeletonModel {
        $skeletonModel = new UseCaseListItemResponseAssemblerMockSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseAssemblerMockFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseListItemResponseAssemblerMockFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseAssemblerImplClassName = $useCaseListItemResponseAssemblerImplFileObject->getClassName(
        );
        $skeletonModel->useCaseListItemResponseAssemblerImplShortName = $useCaseListItemResponseAssemblerImplFileObject->getShortName(
        );

        return $skeletonModel;
    }
}
