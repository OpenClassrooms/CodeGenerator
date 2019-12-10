<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;

class GetEntityUseCaseRequestSkeletonModelAssemblerImpl implements GetEntityUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $getEntityUseCaseRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityUseCaseRequestSkeletonModel {
        $skeletonModel = new GetEntityUseCaseRequestSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
