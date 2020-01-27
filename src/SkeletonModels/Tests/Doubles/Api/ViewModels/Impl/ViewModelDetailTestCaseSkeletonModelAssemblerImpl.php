<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\TestCaseUtility;

class ViewModelDetailTestCaseSkeletonModelAssemblerImpl implements ViewModelDetailTestCaseSkeletonModelAssembler
{
    use StubSkeletonAssemblerTrait;

    public function create(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelTestCaseFileObject
    ): ViewModelDetailTestCaseSkeletonModel {
        $skeletonModel = new ViewModelDetailTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelDetailTestCaseFileObject->getFields();

        $skeletonModel->viewModelDetailClassName = $viewModelDetailFileObject->getClassName();
        $skeletonModel->viewModelDetailShortName = $viewModelDetailFileObject->getShortName();
        $skeletonModel->viewModelDetailMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelDetailTestCaseFileObject->getShortName()
        );

        $skeletonModel->viewModelTestCaseShortName = $viewModelTestCaseFileObject->getShortName();
        $skeletonModel->viewModelTestCaseMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelTestCaseFileObject->getShortName()
        );
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
