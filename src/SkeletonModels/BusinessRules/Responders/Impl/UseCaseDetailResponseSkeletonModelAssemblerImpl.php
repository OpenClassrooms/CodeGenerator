<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseSkeletonModelAssembler;

class UseCaseDetailResponseSkeletonModelAssemblerImpl implements UseCaseDetailResponseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseDetailResponseFileObject
    ): UseCaseDetailResponseSkeletonModel {
        $skeletonModel = new UseCaseDetailResponseSkeletonModelImpl();
        $skeletonModel->genericUseCaseDetailMethods = $useCaseDetailResponseFileObject->getMethods();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();
        $skeletonModel->namespace = $useCaseDetailResponseFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
