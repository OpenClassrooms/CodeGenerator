<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseSkeletonModelAssembler;

class UseCaseResponseTestCaseSkeletonModelAssemblerImpl implements UseCaseResponseTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseResponseTestCaseSkeletonModel {
        $skeletonModel = new UseCaseResponseTestCaseSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseResponseTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseResponseTestCaseFileObject->getShortName();
        $skeletonModel->useCaseResponseClassName = $useCaseResponseFileObject->getClassName();
        $skeletonModel->useCaseResponseMethods = $useCaseResponseFileObject->getMethods();
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();

        return $skeletonModel;
    }
}
