<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTestCase\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTestCase\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTestCase\ViewModelTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseSkeletonModelAssemblerImpl implements ViewModelTestCaseSkeletonModelAssembler
{
    public function create(FileObject $viewModelTestCaseFileObject, FileObject $viewModelFileObject): ViewModelTestCaseSkeletonModel
    {
        $skeletonModel = new ViewModelTestCaseSkeletonModelImpl();
        $skeletonModel->className = $viewModelTestCaseFileObject->getClassName();
        $skeletonModel->namespace = $viewModelTestCaseFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelTestCaseFileObject->getShortName();
        $skeletonModel->fields = $viewModelTestCaseFileObject->getFields();
        $skeletonModel->sourceClassName = $viewModelFileObject->getClassName();
        $skeletonModel->sourceShortName = $viewModelFileObject->getShortName();

        return $skeletonModel;
    }
}
