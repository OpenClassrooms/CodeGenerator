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
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $viewModelDetailStubFileObject,
        FileObject $viewModelDetailImplFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): ViewModelDetailStubSkeletonModel
    {
        $skeletonModel = new ViewModelDetailStubSkeletonModelImpl();
        $skeletonModel->className = $viewModelDetailStubFileObject->getClassName();
        $skeletonModel->namespace = $viewModelDetailStubFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelDetailStubFileObject->getShortName();
        $skeletonModel->fields = $viewModelDetailStubFileObject->getFields();
        $skeletonModel->constants = $viewModelDetailStubFileObject->getConsts();
        $skeletonModel->parentClassName = $viewModelDetailImplFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelDetailImplFileObject->getShortName();
        $skeletonModel->useCaseDetailResponseStubClassName = $useCaseDetailResponseStubFileObject->getClassName();
        $skeletonModel->hasConstructor = $this->hasConstructor($viewModelDetailStubFileObject->getFields());

        return $skeletonModel;
    }
}
