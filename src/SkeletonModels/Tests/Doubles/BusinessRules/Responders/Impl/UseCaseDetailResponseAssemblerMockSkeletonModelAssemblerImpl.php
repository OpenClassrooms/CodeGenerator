<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseAssemblerMockSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerMockSkeletonModelAssemblerImpl implements UseCaseDetailResponseAssemblerMockSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): UseCaseDetailResponseAssemblerMockSkeletonModel {
        $skeletonModel = new UseCaseDetailResponseAssemblerMockSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseAssemblerMockFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseAssemblerMockFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseAssemblerImplClassName = $useCaseDetailResponseAssemblerImplFileObject->getClassName(
        );
        $skeletonModel->useCaseDetailResponseAssemblerImplShortName = $useCaseDetailResponseAssemblerImplFileObject->getShortName(
        );

        return $skeletonModel;
    }
}
