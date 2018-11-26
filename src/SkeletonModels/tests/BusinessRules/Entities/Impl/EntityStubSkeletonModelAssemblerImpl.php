<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Entities\EntityStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubSkeletonModelAssemblerImpl implements EntityStubSkeletonModelAssembler
{
    public function create(FileObject $viewModelStubFileObject, FileObject $viewModelImplFileObject): EntityStubSkeletonModel
    {
        $skeletonModel = new EntityStubSkeletonModelImpl();
        $skeletonModel->className = $viewModelStubFileObject->getClassName();
        $skeletonModel->namespace = $viewModelStubFileObject->getNamespace();
        $skeletonModel->shortName = $viewModelStubFileObject->getShortName();
        $skeletonModel->fields = $viewModelStubFileObject->getFields();
        $skeletonModel->parentClassName = $viewModelImplFileObject->getClassName();
        $skeletonModel->parentShortName = $viewModelImplFileObject->getShortName();

        return $skeletonModel;
    }
}
