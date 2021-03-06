<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseDetailResponseTestCaseSkeletonModelAssembler;

class UseCaseDetailResponseTestCaseSkeletonModelAssemblerImpl implements UseCaseDetailResponseTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseDetailResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): UseCaseDetailResponseTestCaseSkeletonModel {
        $skeletonModel = new UseCaseDetailResponseTestCaseSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseDetailResponseTestCaseFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseClassName = $useCaseDetailResponseFileObject->getClassName();
        $skeletonModel->useCaseDetailResponseMethods = $useCaseDetailResponseFileObject->getMethods();
        $skeletonModel->useCaseDetailResponseShortName = $useCaseDetailResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseTestCaseShortName = $useCaseResponseTestCaseFileObject->getShortName();

        return $skeletonModel;
    }
}
