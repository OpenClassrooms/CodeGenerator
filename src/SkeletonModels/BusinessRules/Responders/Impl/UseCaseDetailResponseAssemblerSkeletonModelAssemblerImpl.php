<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseAssemblerSkeletonModelAssembler;

class UseCaseDetailResponseAssemblerSkeletonModelAssemblerImpl implements UseCaseDetailResponseAssemblerSkeletonModelAssembler
{
    public function create(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject
    ): UseCaseDetailResponseAssemblerSkeletonModel {
        $skeletonModel = new UseCaseDetailResponseAssemblerSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseAssemblerFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseAssemblerFileObject->getShortName();
        $skeletonModel->entityClassName = $entityFileObject->getClassName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
