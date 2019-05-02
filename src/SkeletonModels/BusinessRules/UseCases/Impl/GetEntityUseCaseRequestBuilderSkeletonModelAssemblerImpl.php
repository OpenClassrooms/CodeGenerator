<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestBuilderSkeletonModelAssemblerImpl implements GetEntityUseCaseRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderSkeletonModel
    {
        $skeletonModel = new GetEntityUseCaseRequestBuilderSkeletonModelImpl();
        $skeletonModel->shortName = $getEntityUseCaseRequestBuilderFileObject->getShortName();
        $skeletonModel->namespace = $getEntityUseCaseRequestBuilderFileObject->getNamespace();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->getEntityUseCaseRequest = $getEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
