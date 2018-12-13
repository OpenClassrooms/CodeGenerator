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
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): ViewModelListItemStubSkeletonModel
    {
        $skeletonModel = new ViewModelListItemStubSkeletonModelImpl();
        $skeletonModel->className = $viewModelListItemStubFileObject->getClassName();
        $skeletonModel->namespace = $viewModelListItemStubFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelListItemStubFileObject->getShortName();
        $skeletonModel->fields = $viewModelListItemStubFileObject->getFields();
        $skeletonModel->constants = $viewModelListItemStubFileObject->getConsts();
        $skeletonModel->parentClassName = $viewModelListItemImplFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelListItemImplFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseStubClassName = $useCaseListItemResponseStubFileObject->getClassName();
        $skeletonModel->hasConstructor = $this->hasConstructor($viewModelListItemStubFileObject->getFields());

        return $skeletonModel;
    }
}
