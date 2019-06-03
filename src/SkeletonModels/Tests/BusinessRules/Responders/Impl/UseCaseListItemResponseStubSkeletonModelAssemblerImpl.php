<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\StubSkeletonAssemblerUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubSkeletonModelAssemblerImpl implements UseCaseListItemResponseStubSkeletonModelAssembler
{
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel
    {
        $skeletonModel = new UseCaseListItemResponseStubSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseListItemResponseStubFileObject->getNamespace();
        $skeletonModel->className = $useCaseListItemResponseStubFileObject->getClassName();
        $skeletonModel->useCaseListItemResponseDTOClassName = $useCaseListItemResponseDTOFileObject->getClassName();
        $skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $skeletonModel->shortName = $useCaseListItemResponseStubFileObject->getShortName();
        $skeletonModel->useCaseListItemResponseDTOShortName = $useCaseListItemResponseDTOFileObject->getShortName();
        $skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();
        $skeletonModel->fields = $useCaseListItemResponseStubFileObject->getFields();
        $skeletonModel->constants = $useCaseListItemResponseStubFileObject->getConsts();
        $skeletonModel->hasConstructor = $this->hasConstructor($useCaseListItemResponseStubFileObject->getFields());
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
