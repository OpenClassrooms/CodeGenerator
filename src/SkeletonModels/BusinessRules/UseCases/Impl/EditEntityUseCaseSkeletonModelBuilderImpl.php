<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\SecurityClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class EditEntityUseCaseSkeletonModelBuilderImpl implements EditEntityUseCaseSkeletonModelBuilder
{
    use SecurityClassNameTrait;
    use UseCaseClassNameTrait;

    /**
     * @var EditEntityUseCaseSkeletonModel
     */
    private $skeletonModel;

    public function build(): EditEntityUseCaseSkeletonModel
    {
        $this->skeletonModel->transactionClassName = $this->transactionClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $this->skeletonModel->securityClassName = $this->securityClassName;

        return $this->skeletonModel;
    }

    public function create(): EditEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel = new EditEntityUseCaseSkeletonModelImpl();

        return $this;
    }

    public function withEditEntityUseCaseFileObject(
        FileObject $editEntityUseCaseFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->className = $editEntityUseCaseFileObject->getClassName();
        $this->skeletonModel->namespace = $editEntityUseCaseFileObject->getNamespace();
        $this->skeletonModel->shortName = $editEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function withEditEntityUseCaseRequestFileObject(
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {

        $this->skeletonModel->editEntityUseCaseRequestClassName = $editEntityUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->editEntityUseCaseRequestShortName = $editEntityUseCaseRequestFileObject->getShortName();

        return $this;
    }

    public function withEntityCommonHydratorTraitFileObject(
        FileObject $entityCommonHydratorTraitFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityCommonHydratorTraitShortName = $entityCommonHydratorTraitFileObject->getShortName();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): EditEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $this->skeletonModel->entityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();
        $this->skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());

        return $this;
    }

    public function withEntityGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {

        $this->skeletonModel->entityGatewayArgument = lcfirst($entityGatewayFileObject->getShortName());
        $this->skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {

        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();

        return $this;
    }

    public function withEntityUseCaseDetailResponseAssemblerFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {

        $this->skeletonModel->entityUseCaseDetailResponseAssemblerArgument = lcfirst(
            $entityUseCaseDetailResponseAssemblerFileObject->getShortName()
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerClassName = $entityUseCaseDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerShortName = $entityUseCaseDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): EditEntityUseCaseSkeletonModelBuilder {

        $this->skeletonModel->entityUseCaseDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }
}
