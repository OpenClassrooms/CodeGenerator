<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PatchEntityControllerSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller\PatchEntityControllerSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class PatchEntityControllerSkeletonModelBuilderImpl implements PatchEntityControllerSkeletonModelBuilder
{
    /**
     * @var PatchEntityControllerSkeletonModel
     */
    private $skeletonModel;

    public function create(): PatchEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel = new PatchEntityControllerSkeletonModelImpl();

        return $this;
    }

    public function withPatchEntityControllerFileObject(
        FileObject $patchEntityControllerFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->className = $patchEntityControllerFileObject->getClassName();
        $this->skeletonModel->namespace = $patchEntityControllerFileObject->getNamespace();
        $this->skeletonModel->shortName = $patchEntityControllerFileObject->getShortName();

        return $this;
    }

    public function withEditEntityUseCaseFileObject(
        FileObject $editEntityUseCaseFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseClassName = $editEntityUseCaseFileObject->getClassName();

        $this->skeletonModel->editEntityUseCaseShortName = $editEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function withEditEntityUseCaseRequestFileObject(
        FileObject $editEntityUseCaseRequestFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseRequestClassName = $editEntityUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->editEntityUseCaseRequestShortName = $editEntityUseCaseRequestFileObject->getShortName();

        return $this;
    }

    public function withEditEntityUseCaseRequestBuilderFileObject(
        FileObject $editEntityUseCaseRequestBuilderFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseRequestBuilderArgument = lcfirst(
            $editEntityUseCaseRequestBuilderFileObject->getShortName()
        );
        $this->skeletonModel->editEntityUseCaseRequestBuilderClassName = $editEntityUseCaseRequestBuilderFileObject->getClassName(
        );
        $this->skeletonModel->editEntityUseCaseRequestBuilderShortName = $editEntityUseCaseRequestBuilderFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();
        $this->skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName();

        return $this;
    }

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityViewModelDetailFileObject(
        FileObject $entityViewModelDetailFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelDetailClassName = $entityViewModelDetailFileObject->getClassName();
        $this->skeletonModel->entityViewModelDetailShortName = $entityViewModelDetailFileObject->getShortName();

        return $this;
    }

    public function withEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->entityViewModelDetailAssemblerArgument = lcfirst(
            $entityViewModelDetailAssemblerFileObject->getShortName()
        );
        $this->skeletonModel->entityViewModelDetailAssemblerClassName = $entityViewModelDetailAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityViewModelDetailAssemblerShortName = $entityViewModelDetailAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withPatchEntityModelFileObject(
        FileObject $patchEntityModelFileObject
    ): PatchEntityControllerSkeletonModelBuilder {
        $this->skeletonModel->patchEntityModelClassName = $patchEntityModelFileObject->getClassName();
        $this->skeletonModel->patchEntityModelFields = $patchEntityModelFileObject->getFields();
        $this->skeletonModel->patchEntityModelShortName = $patchEntityModelFileObject->getShortName();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): PatchEntityControllerSkeletonModelBuilder
    {
        $this->skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());
        $this->skeletonModel->updateEntityMethod = NameUtility::createUpdateEntityMethodName(
            $entityFileObject->getShortName()
        );
        $this->skeletonModel->withEntityIdMethod = NameUtility::createChainedEntityIdMethodName(
            $entityFileObject->getShortName()
        );

        return $this;
    }

    public function build(): PatchEntityControllerSkeletonModel
    {

        return $this->skeletonModel;
    }
}
