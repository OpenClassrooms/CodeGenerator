<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubSkeletonModelAssemblerImpl implements ViewModelListItemStubSkeletonModelAssembler
{
    public function create(FileObject $stubFileObject, FileObject $viewModelListItemImplFileObject): ViewModelListItemStubSkeletonModel
    {
        $skeletonModel = new ViewModelListItemStubSkeletonModelImpl();
        $skeletonModel->className = $stubFileObject->getClassName();
        $skeletonModel->namespace = $stubFileObject->getNamespace();
        $skeletonModel->shortName = $stubFileObject->getShortName();
        $skeletonModel->fields = $stubFileObject->getFields();
        $skeletonModel->parentClassName = $viewModelListItemImplFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelListItemImplFileObject->getShortName();

        return $skeletonModel;
    }
}
