<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

class CreateEntityUseCaseRequestSkeletonModelAssemblerImpl implements CreateEntityUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createRequestTraitFileObject,
        FileObject $entityUseCaseCommonRequestFileObject
    ): CreateEntityUseCaseRequestSkeletonModel {
        $skeletonModel = new CreateEntityUseCaseRequestSkeletonModelImpl();

        $skeletonModel->className = $createEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->namespace = $createEntityUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $createEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->fields = $createEntityUseCaseRequestFileObject->getFields();
        $skeletonModel->methods = $createEntityUseCaseRequestFileObject->getMethods();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $skeletonModel->useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $skeletonModel->createRequestTraitClassName = $createRequestTraitFileObject->getClassName();
        $skeletonModel->createRequestTraitShortName = $createRequestTraitFileObject->getShortName();
        $skeletonModel->entityUseCaseCommonRequestTraitShortName = $entityUseCaseCommonRequestFileObject->getShortName(
        );

        return $skeletonModel;
    }
}
