<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class UseCaseListItemResponseTestCaseSkeletonModelAssemblerImpl implements UseCaseListItemResponseTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseListItemResponseTestCaseFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTestCaseFileObject
    ): UseCaseListItemResponseTestCaseSkeletonModel {
        $skeletonModel = new UseCaseListItemResponseTestCaseSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseListItemResponseTestCaseFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseClassName = $useCaseListItemResponseFileObject->getClassName();
        $skeletonModel->useCaseListItemResponseMethods = $useCaseListItemResponseFileObject->getMethods();
        $skeletonModel->useCaseListItemResponseShortName = $useCaseListItemResponseFileObject->getShortName();
        $skeletonModel->useCaseListItemResponses = StringUtility::pluralize(
            $useCaseListItemResponseFileObject->getShortName()
        );
        $skeletonModel->useCaseResponseShortName = $useCaseResponseFileObject->getShortName();
        $skeletonModel->useCaseResponseTestCaseShortName = $useCaseResponseTestCaseFileObject->getShortName();

        return $skeletonModel;
    }
}
