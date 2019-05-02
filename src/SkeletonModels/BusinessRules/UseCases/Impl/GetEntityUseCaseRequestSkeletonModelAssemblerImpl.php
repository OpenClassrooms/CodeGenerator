<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestSkeletonModelAssemblerImpl implements GetEntityUseCaseRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $getEntityUseCaseRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityUseCaseRequestSkeletonModel
    {
        $skeletonModel = new GetEntityUseCaseRequestSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityUseCaseRequestFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
