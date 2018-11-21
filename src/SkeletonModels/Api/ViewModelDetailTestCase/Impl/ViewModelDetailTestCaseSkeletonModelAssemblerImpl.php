<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetailTestCase\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetailTestCase\ViewModelDetailTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelDetailTestCase\ViewModelDetailTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailTestCaseSkeletonModelAssemblerImpl implements ViewModelDetailTestCaseSkeletonModelAssembler
{
    public function create(
        FileObject $viewModelDetailTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject
    ): ViewModelDetailTestCaseSkeletonModel
    {
        $skeletonModel = new ViewModelDetailTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelDetailTestCaseFileObject->getFields();
        $skeletonModel->sourceClassName = $viewModelTestCaseFileObject->getClassName();
        $skeletonModel->sourceShortName = $viewModelTestCaseFileObject->getShortName();

        return $skeletonModel;
    }
}
