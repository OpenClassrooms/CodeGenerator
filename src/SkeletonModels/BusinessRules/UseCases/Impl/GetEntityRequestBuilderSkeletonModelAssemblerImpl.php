<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderSkeletonModelAssemblerImpl implements GetEntityRequestBuilderSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestBuilderSkeletonModel
    {
        $skeletonModel = new GetEntityRequestBuilderSkeletonModelImpl();
        $skeletonModel->shortName = $getEntityRequestBuilderFileObject->getShortName();
        $skeletonModel->namespace = $getEntityRequestBuilderFileObject->getNamespace();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->getEntityRequest = $getEntityRequestFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
