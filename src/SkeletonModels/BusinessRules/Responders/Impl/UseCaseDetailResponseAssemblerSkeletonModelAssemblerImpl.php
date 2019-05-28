<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl implements UseCaseDetailResponseAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject
    ): UseCaseDetailResponseAssemblerSkeletonModel
    {
        $skeletonModel = new UseCaseDetailResponseAssemblerSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseAssemblerFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
