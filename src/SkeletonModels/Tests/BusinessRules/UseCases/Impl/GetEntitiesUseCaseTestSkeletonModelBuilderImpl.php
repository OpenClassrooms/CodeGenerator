<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class GetEntitiesUseCaseTestSkeletonModelBuilderImpl implements GetEntitiesUseCaseTestSkeletonModelBuilder
{
    use UseCaseResponseClassNameTrait;

    private GetEntitiesUseCaseTestSkeletonModelImpl $skeletonModel;

    public function build(): GetEntitiesUseCaseTestSkeletonModel
    {
        $this->skeletonModel->paginationClassName = $this->pagination;

        return $this->skeletonModel;
    }

    public function create(): GetEntitiesUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntitiesUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function withEntityClassNameFileObject(
        FileObject $entityFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entitiesArgument = StringUtility::pluralize(lcfirst($entityFileObject->getShortName()));
        $this->skeletonModel->entitiesShortName = StringUtility::pluralize($entityFileObject->getShortName());

        return $this;
    }

    public function withEntityClassNameGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withEntityClassNameStubFileObjects(
        array $entityStubFileObjects
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        foreach ($entityStubFileObjects as $entityStubFileObject) {
            $this->skeletonModel->entityStubClassNames[] = $entityStubFileObject->getClassName();
            $this->skeletonModel->entityStubShortNames[] = $entityStubFileObject->getShortName();
        }

        return $this;
    }

    public function withGetEntitiesUseCaseFileObject(
        FileObject $getEntitiesUseCaseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseClassName = $getEntitiesUseCaseFileObject->getClassName();
        $this->skeletonModel->getEntitiesUseCaseShortName = $getEntitiesUseCaseFileObject->getShortName();

        return $this;
    }

    public function withGetEntitiesUseCaseRequestBuilderImplFileObject(
        FileObject $getEntitiesUseCaseRequestBuilderImplFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseRequestBuilderImplClassName = $getEntitiesUseCaseRequestBuilderImplFileObject->getClassName(
        );
        $this->skeletonModel->getEntitiesUseCaseRequestBuilderImplShortName = $getEntitiesUseCaseRequestBuilderImplFileObject->getShortName(
        );

        return $this;
    }

    public function withGetEntitiesUseCaseRequestDTOFileObject(
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseRequestDTOClassName = $getEntitiesUseCaseRequestDTOFileObject->getClassName(
        );
        $this->skeletonModel->getEntitiesUseCaseRequestDTOShortName = $getEntitiesUseCaseRequestDTOFileObject->getShortName(
        );

        return $this;
    }

    public function withGetEntitiesUseCaseRequestFileObject(
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseRequestClassName = $getEntitiesUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->getEntitiesUseCaseRequestShortName = $getEntitiesUseCaseRequestFileObject->getShortName();

        return $this;
    }

    public function withGetEntitiesUseCaseTestFileObject(
        FileObject $getEntitiesUseCaseTestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->namespace = $getEntitiesUseCaseTestFileObject->getNamespace();
        $this->skeletonModel->shortName = $getEntitiesUseCaseTestFileObject->getShortName();

        return $this;
    }

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

        return $this;
    }

    public function withUseCaseListItemResponseAssemblerFileObject(
        FileObject $useCaseListItemResponseAssemblerFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseAssemblerShortName = $useCaseListItemResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withUseCaseListItemResponseAssemblerMockFileObject(
        FileObject $useCaseListItemResponseAssemblerMockFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseAssemblerMockClassName = $useCaseListItemResponseAssemblerMockFileObject->getClassName(
        );
        $this->skeletonModel->useCaseListItemResponseAssemblerMockShortName = $useCaseListItemResponseAssemblerMockFileObject->getShortName(
        );

        return $this;
    }

    public function withUseCaseListItemResponseFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponsesShortName = StringUtility::pluralize(
            $useCaseListItemResponseFileObject->getShortName()
        );

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function withUseCaseListItemResponseStubFileObjects(
        array $useCaseListItemResponseStubFileObjects
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        foreach ($useCaseListItemResponseStubFileObjects as $useCaseListItemResponseStubFileObject) {
            $this->skeletonModel->useCaseListItemResponseStubClassNames[] = $useCaseListItemResponseStubFileObject->getClassName(
            );
            $this->skeletonModel->useCaseListItemResponseStubShortNames[] = $useCaseListItemResponseStubFileObject->getShortName(
            );
        }

        return $this;
    }

    public function withUseCaseListItemResponseTestCaseFileObject(
        FileObject $useCaseListItemResponseTestCaseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseTestCaseClassName = $useCaseListItemResponseTestCaseFileObject->getClassName(
        );
        $this->skeletonModel->useCaseListItemResponseTestCaseShortName = $useCaseListItemResponseTestCaseFileObject->getShortName(
        );

        return $this;
    }
}
