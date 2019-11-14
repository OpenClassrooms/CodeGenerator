<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemStubSkeletonModelAssemblerImpl implements ViewModelListItemStubSkeletonModelAssembler
{
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): ViewModelListItemStubSkeletonModel {
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
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
