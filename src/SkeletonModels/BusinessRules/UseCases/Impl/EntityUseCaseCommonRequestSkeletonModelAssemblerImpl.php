<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestSkeletonModelAssembler;

class EntityUseCaseCommonRequestSkeletonModelAssemblerImpl implements EntityUseCaseCommonRequestSkeletonModelAssembler
{
    public function create(FileObject $entityUseCaseCommonRequestFileObject): EntityUseCaseCommonRequestSkeletonModel
    {
        $skeletonModel = new EntityUseCaseCommonRequestSkeletonModelImpl();

        $skeletonModel->className = $entityUseCaseCommonRequestFileObject->getClassName();
        $skeletonModel->fields = $entityUseCaseCommonRequestFileObject->getFields();
        $skeletonModel->methods = $entityUseCaseCommonRequestFileObject->getMethods();
        $skeletonModel->namespace = $entityUseCaseCommonRequestFileObject->getNamespace();
        $skeletonModel->shortName = $entityUseCaseCommonRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
