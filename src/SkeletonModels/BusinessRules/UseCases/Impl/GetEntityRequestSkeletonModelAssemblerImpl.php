<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestSkeletonModelAssemblerImpl implements GetEntityRequestSkeletonModelAssembler
{
    use UseCaseClassNameTrait;

    public function create(
        FileObject $getEntityRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityRequestSkeletonModel
    {
        $skeletonModel = new GetEntityRequestSkeletonModelImpl();
        $skeletonModel->namespace = $getEntityRequestFileObject->getNamespace();
        $skeletonModel->shortName = $getEntityRequestFileObject->getShortName();
        $skeletonModel->entityShortName = $entityFileObject->getShortName();
        $skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $skeletonModel;
    }
}
