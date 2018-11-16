<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailStubSkeletonModelAssemblerImpl implements ViewModelDetailStubSkeletonModelAssembler
{
    public function create(FileObject $stubFileObject, FileObject $viewModelDetailImplFileObject): ViewModelDetailStubSkeletonModel
    {
        $skeletonModel = new ViewModelDetailStubSkeletonModelImpl();
        $skeletonModel->className = $stubFileObject->getClassName();
        $skeletonModel->namespace = $stubFileObject->getNamespace();
        $skeletonModel->shortName = $stubFileObject->getShortName();
        $skeletonModel->fields = $stubFileObject->getFields();
        $skeletonModel->parentClassName = $viewModelDetailImplFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelDetailImplFileObject->getShortName();

        return $skeletonModel;
    }
}
