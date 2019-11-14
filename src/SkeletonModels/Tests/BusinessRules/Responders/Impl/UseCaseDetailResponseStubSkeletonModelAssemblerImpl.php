<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\StubSkeletonAssemblerUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubSkeletonModelAssemblerImpl implements UseCaseDetailResponseStubSkeletonModelAssembler
{
    use StubSkeletonAssemblerUtility;

    public function create(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $entityStubFileObject
    ): UseCaseDetailResponseStubSkeletonModel {
        $skeletonModel = new UseCaseDetailResponseStubSkeletonModelImpl();
        $skeletonModel->namespace = $useCaseDetailResponseStubFileObject->getNamespace();
        $skeletonModel->className = $useCaseDetailResponseStubFileObject->getClassName();
        $skeletonModel->parentClassName = $useCaseDetailResponseFileObject->getClassName();
        $skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $skeletonModel->shortName = $useCaseDetailResponseStubFileObject->getShortName();
        $skeletonModel->parentShortName = $useCaseDetailResponseFileObject->getShortName();
        $skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();
        $skeletonModel->fields = $useCaseDetailResponseStubFileObject->getFields();
        $skeletonModel->constants = $useCaseDetailResponseStubFileObject->getConsts();
        $skeletonModel->hasConstructor = $this->hasConstructor($useCaseDetailResponseStubFileObject->getFields());
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
