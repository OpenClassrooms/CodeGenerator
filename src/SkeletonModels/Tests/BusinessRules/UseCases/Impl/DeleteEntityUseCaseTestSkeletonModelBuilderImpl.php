<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class DeleteEntityUseCaseTestSkeletonModelBuilderImpl implements DeleteEntityUseCaseTestSkeletonModelBuilder
{
    private DeleteEntityUseCaseTestSkeletonModel $skeletonModel;

    public function create(): DeleteEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new DeleteEntityUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function withDeleteEntityUseCaseFileObject(
        FileObject $deleteEntityUseCaseFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->deleteEntityUseCaseClassName = $deleteEntityUseCaseFileObject->getClassName();
        $this->skeletonModel->deleteEntityUseCaseMethod = lcfirst($deleteEntityUseCaseFileObject->getShortName());
        $this->skeletonModel->deleteEntityUseCaseShortName = $deleteEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function withDeleteEntityUseCaseTestFileObject(
        FileObject $deleteEntityUseCaseTestFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->className = $deleteEntityUseCaseTestFileObject->getClassName();
        $this->skeletonModel->shortName = $deleteEntityUseCaseTestFileObject->getShortName();
        $this->skeletonModel->namespace = $deleteEntityUseCaseTestFileObject->getNamespace();
        $this->skeletonModel->withEntityIdMethod = NameUtility::createChainedEntityIdMethodName(
            $deleteEntityUseCaseTestFileObject->getEntity()
        );
        $this->skeletonModel->entitiesArgument = lcfirst(
            StringUtility::pluralize($deleteEntityUseCaseTestFileObject->getEntity())
        );
        $this->skeletonModel->entityArgument = lcfirst($deleteEntityUseCaseTestFileObject->getEntity());
        $this->skeletonModel->entityIdArgument = NameUtility::createEntityIdName(
            $deleteEntityUseCaseTestFileObject->getEntity()
        );

        return $this;
    }

    public function withDeleteEntityUseCaseRequestFileObject(
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->deleteEntityUseCaseRequestClassName = $deleteEntityUseCaseRequestFileObject->getClassName(
        );
        $this->skeletonModel->deleteEntityUseCaseRequestShortName = $deleteEntityUseCaseRequestFileObject->getShortName(
        );

        return $this;
    }

    public function withDeleteEntityUseCaseRequestBuilderImplFileObject(
        FileObject $deleteEntityUseCaseRequestBuilderImplFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->deleteEntityUseCaseRequestBuilderImplClassName = $deleteEntityUseCaseRequestBuilderImplFileObject->getClassName(
        );
        $this->skeletonModel->deleteEntityUseCaseRequestBuilderImplShortName = $deleteEntityUseCaseRequestBuilderImplFileObject->getShortName(
        );

        return $this;
    }

    public function withDeleteEntityUseCaseRequestDTOFileObject(
        FileObject $deleteEntityUseCaseRequestDTOFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->deleteEntityUseCaseRequestDTOClassName = $deleteEntityUseCaseRequestDTOFileObject->getClassName(
        );
        $this->skeletonModel->deleteEntityUseCaseRequestDTOShortName = $deleteEntityUseCaseRequestDTOFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();

        return $this;
    }

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $this->skeletonModel->entityStubArgument = NameUtility::createEntityStubName(
            $entityStubFileObject->getEntity()
        );
        $this->skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();

        return $this;
    }

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): DeleteEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

        return $this;
    }

    public function build(): DeleteEntityUseCaseTestSkeletonModel
    {
        return $this->skeletonModel;
    }
}
