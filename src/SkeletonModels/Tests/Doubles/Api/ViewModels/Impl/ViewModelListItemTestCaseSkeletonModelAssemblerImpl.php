<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\TestCaseUtility;

class ViewModelListItemTestCaseSkeletonModelAssemblerImpl implements ViewModelListItemTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): ViewModelListItemTestCaseSkeletonModel {
        $skeletonModel = new ViewModelListItemTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelListItemTestCaseFileObject->getFields();

        $skeletonModel->viewModelListItemClassName = $viewModelListItemFileObject->getClassName();
        $skeletonModel->viewModelListItemShortName = $viewModelListItemFileObject->getShortName();
        $skeletonModel->viewModelListItemMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelListItemFileObject->getShortName()
        );

        $skeletonModel->viewModelTestCaseShortName = $viewModelTestCaseFileObject->getShortName();
        $skeletonModel->viewModelTestCaseMethod = TestCaseUtility::buildTestCaseAssertMethodName(
            $viewModelTestCaseFileObject->getShortName()
        );

        return $skeletonModel;
    }
}
