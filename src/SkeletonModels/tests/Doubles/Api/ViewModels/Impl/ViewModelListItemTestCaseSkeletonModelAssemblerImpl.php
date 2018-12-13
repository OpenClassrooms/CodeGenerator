<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemTestCaseSkeletonModelAssemblerImpl implements ViewModelListItemTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): ViewModelListItemTestCaseSkeletonModel
    {
        $skeletonModel = new ViewModelListItemTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelListItemTestCaseFileObject->getFields();
        $skeletonModel->viewModelListItemClassName = $viewModelListItemFileObject->getClassName();
        $skeletonModel->viewModelListItemShortName = $viewModelListItemFileObject->getShortName();
        $skeletonModel->viewModelTestCaseShortName = $viewModelTestCaseFileObject->getShortName();

        return $skeletonModel;
    }
}
