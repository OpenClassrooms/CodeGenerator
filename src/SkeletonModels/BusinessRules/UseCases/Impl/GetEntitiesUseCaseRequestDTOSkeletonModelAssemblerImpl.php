<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use Faker\Provider\File;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseRequestDTOSkeletonModelAssemblerImpl implements GetEntitiesUseCaseRequestDTOSkeletonModelAssembler
{
    use UseCaseResponseClassNameTrait;

    public function create(
        FileObject $getEntitiesUseCaseRequestFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): GetEntitiesUseCaseRequestDTOSkeletonModel {
        $skeletonModel = new GetEntitiesUseCaseRequestDTOSkeletonModelImpl();

        $skeletonModel->getEntitiesUseCaseRequestClassName = $getEntitiesUseCaseRequestFileObject->getClassName();
        $skeletonModel->getEntitiesUseCaseRequestShortName = $getEntitiesUseCaseRequestFileObject->getShortName();
        $skeletonModel->paginationClassName = $this->pagination;
        $skeletonModel->paginationShortName = FileObjectUtility::getShortClassName($this->pagination);
        $skeletonModel->namespace = $getEntitiesUseCaseRequestDTOFileObject->getNamespace();
        $skeletonModel->shortName = $getEntitiesUseCaseRequestDTOFileObject->getShortName();

        return $skeletonModel;
    }
}
