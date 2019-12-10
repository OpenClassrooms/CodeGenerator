<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitSkeletonModelAssembler;

class EntityUseCaseCommonRequestTraitSkeletonModelAssemblerImpl implements EntityUseCaseCommonRequestTraitSkeletonModelAssembler
{
    public function create(
        FileObject $entityUseCaseCommonRequestFileObject
    ): EntityUseCaseCommonRequestTraitSkeletonModel {
        $skeletonModel = new EntityUseCaseCommonRequestTraitSkeletonModelImpl();

        $skeletonModel->className = $entityUseCaseCommonRequestFileObject->getClassName();
        $skeletonModel->fields = $entityUseCaseCommonRequestFileObject->getFields();
        $skeletonModel->methods = $entityUseCaseCommonRequestFileObject->getMethods();
        $skeletonModel->namespace = $entityUseCaseCommonRequestFileObject->getNamespace();
        $skeletonModel->shortName = $entityUseCaseCommonRequestFileObject->getShortName();

        return $skeletonModel;
    }
}
