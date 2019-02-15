<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailTestCaseSkeletonModelAssemblerImpl implements ViewModelDetailTestCaseSkeletonModelAssembler
{
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelDetailFileObject,
        FileObject $viewModelTestCaseFileObject
    ): ViewModelDetailTestCaseSkeletonModel
    {
        $skeletonModel = new ViewModelDetailTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelDetailTestCaseFileObject->getFields();
        $skeletonModel->viewModelDetailClassName = $viewModelDetailFileObject->getClassName();
        $skeletonModel->viewModelDetailShortName = $viewModelDetailFileObject->getShortName();
        $skeletonModel->viewModelTestCaseShortName = $viewModelTestCaseFileObject->getShortName();
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
