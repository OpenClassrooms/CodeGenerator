<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\EntityStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\EntityStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\StubSkeletonAssemblerTrait;

class EntityStubSkeletonModelAssemblerImpl implements EntityStubSkeletonModelAssembler
{
    use StubSkeletonAssemblerTrait;

    public function create(
        FileObject $entityImplFileObject,
        FileObject $entityStubFileObject
    ): EntityStubSkeletonModel {
        $skeletonModel = new EntityStubSkeletonModelImpl();
        $skeletonModel->className = $entityStubFileObject->getClassName();
        $skeletonModel->namespace = $entityStubFileObject->getNamespace();
        $skeletonModel->shortName = $entityStubFileObject->getShortName();
        $skeletonModel->fields = $entityStubFileObject->getFields();
        $skeletonModel->constants = $entityStubFileObject->getConsts();
        $skeletonModel->parentShortName = $entityImplFileObject->getShortName();
        $skeletonModel->parentClassName = $entityImplFileObject->getClassName();
        $skeletonModel->hasConstructor = $this->hasConstructor($entityStubFileObject->getFields());
        $skeletonModel->dateTimeType = $this->getDateTimeType();

        return $skeletonModel;
    }
}
