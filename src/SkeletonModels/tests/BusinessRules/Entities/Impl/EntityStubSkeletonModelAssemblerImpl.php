<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelStubSkeletonModelAssemblerImpl implements ViewModelStubSkeletonModelAssembler
{
    public function create(FileObject $viewModelStubFileObject, FileObject $viewModelImplFileObject): ViewModelStubSkeletonModel
    {
        $skeletonModel = new ViewModelStubSkeletonModelImpl();
        $skeletonModel->className = $viewModelStubFileObject->getClassName();
        $skeletonModel->namespace = $viewModelStubFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelStubFileObject->getShortName();
        $skeletonModel->fields = $viewModelStubFileObject->getFields();
        $skeletonModel->parentClassName = $viewModelImplFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelImplFileObject->getShortName();

        return $skeletonModel;
    }
}
