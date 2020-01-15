<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class EditEntityUseCaseRequestBuilderImplSkeletonModelAssemblerImpl implements EditEntityUseCaseRequestBuilderImplSkeletonModelAssembler
{
    public function create(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestBuilderImplFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestBuilderImplSkeletonModel {
        $skeletonModel = new EditEntityUseCaseRequestBuilderImplSkeletonModelImpl();

        $skeletonModel->className = $editEntityUseCaseRequestBuilderImplFileObject->getClassName();
        $skeletonModel->methods = $editEntityUseCaseRequestBuilderImplFileObject->getMethods();
        $skeletonModel->shortName = $editEntityUseCaseRequestBuilderImplFileObject->getShortName();
        $skeletonModel->namespace = $editEntityUseCaseRequestBuilderImplFileObject->getNamespace();
        $skeletonModel->editEntityUseCaseRequestClassName = $editEntityUseCaseRequestFileObject->getClassName();
        $skeletonModel->editEntityUseCaseRequestShortName = $editEntityUseCaseRequestFileObject->getShortName();
        $skeletonModel->editEntityUseCaseRequestBuilderClassName = $editEntityUseCaseRequestBuilderFileObject->getClassName(
        );
        $skeletonModel->editEntityUseCaseRequestBuilderShortName = $editEntityUseCaseRequestBuilderFileObject->getShortName(
        );
        $skeletonModel->editEntityUseCaseRequestDTOShortName = $editEntityUseCaseRequestDTOFileObject->getShortName();
        $skeletonModel->entityIdMethodName = NameUtility::createChainedEntityIdMethodName(
            $editEntityUseCaseRequestBuilderFileObject->getEntity()
        );
        $skeletonModel->entityIdArgumentName = NameUtility::createEntityIdName(
            $editEntityUseCaseRequestBuilderFileObject->getEntity()
        );

        return $skeletonModel;
    }
}
