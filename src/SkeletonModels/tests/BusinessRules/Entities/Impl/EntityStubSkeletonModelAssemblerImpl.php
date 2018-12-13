<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl\StubSkeletonAssemblerUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubSkeletonModelAssemblerImpl implements EntityStubSkeletonModelAssembler
{
    use StubSkeletonAssemblerUtility;

    public function create(FileObject $entityStubFileObject, FileObject $entityImplFileObject): EntityStubSkeletonModel
    {
        $skeletonModel = new EntityStubSkeletonModelImpl();
        $skeletonModel->className = $entityStubFileObject->getClassName();
        $skeletonModel->namespace = $entityStubFileObject->getNamespace();
        $skeletonModel->shortName = $entityStubFileObject->getShortName();
        $skeletonModel->fields = $entityStubFileObject->getFields();
        $skeletonModel->constants = $entityStubFileObject->getConsts();
        $skeletonModel->parentShortName = $entityImplFileObject->getShortName();
        $skeletonModel->parentClassName = $entityImplFileObject->getClassName();
        $skeletonModel->hasConstructor = $this->hasConstructor($entityStubFileObject->getFields());

        return $skeletonModel;
    }
}
