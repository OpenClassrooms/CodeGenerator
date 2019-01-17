<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubSkeletonModelAssemblerImpl implements UseCaseListItemResponseStubSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel
    {
        $skeletonModel = new UseCaseListItemResponseStubSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseStubFileObject->getNamespace();
        $skeletonModel->className = $useCaseListItemResponseStubFileObject->getClassName();
        $skeletonModel->parentClassName = $useCaseListItemResponseFileObject->getClassName();
        $skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $skeletonModel->shortName = $useCaseListItemResponseStubFileObject->getShortName();
        $skeletonModel->parentShortName = $useCaseListItemResponseFileObject->getShortName();
        $skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();
        $skeletonModel->fields = $useCaseListItemResponseStubFileObject->getFields();
        $skeletonModel->constants = $useCaseListItemResponseStubFileObject->getConsts();

        return $skeletonModel;
    }
}
