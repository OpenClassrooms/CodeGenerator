<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitSkeletonModelAssembler;

class UseCaseResponseCommonFieldTraitSkeletonModelAssemblerImpl implements UseCaseResponseCommonFieldTraitSkeletonModelAssembler
{
    public function create(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseResponseCommonFieldTraitSkeletonModel {
        $skeletonModel = new UseCaseResponseCommonFieldTraitSkeletonModelImpl();
        $skeletonModel->fields = $useCaseResponseCommonFieldTraitFileObject->getFields();
        $skeletonModel->methods = $useCaseResponseCommonFieldTraitFileObject->getMethods();
        $skeletonModel->namespace = $useCaseResponseCommonFieldTraitFileObject->getNamespace();
        $skeletonModel->shortName = $useCaseResponseCommonFieldTraitFileObject->getShortName();

        return $skeletonModel;
    }
}
