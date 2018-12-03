<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubSkeletonModelAssemblerImpl implements UseCaseDetailResponseStubSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailStub,
        FileObject $entityStubFileObject
    ): UseCaseDetailResponseStubSkeletonModel
    {
        $skeletonModel = new UseCaseDetailResponseStubSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseStubFileObject->getNamespace();
        $skeletonModel->className = $useCaseDetailResponseStubFileObject->getClassName();
        $skeletonModel->parentClassName = $useCaseDetailResponseFileObject->getClassName();
        $skeletonModel->viewModelDetailStubClassName = $viewModelDetailStub->getClassName();
        $skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $skeletonModel->shortName = $useCaseDetailResponseStubFileObject->getShortName();
        $skeletonModel->parentShortName = $useCaseDetailResponseFileObject->getShortName();
        $skeletonModel->viewModelDetailStubShortName = $viewModelDetailStub->getShortName();
        $skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();
        $skeletonModel->fields = $useCaseDetailResponseStubFileObject->getFields();

        return $skeletonModel;
    }
}
