<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\UseCarbonTrait;

class CreateEntityUseCaseTestSkeletonModelBuilderImpl implements CreateEntityUseCaseTestSkeletonModelBuilder
{
    use UseCarbonTrait;

    private CreateEntityUseCaseTestSkeletonModelImpl $skeletonModel;

    public function build(): CreateEntityUseCaseTestSkeletonModel
    {
        $this->skeletonModel->useCarbon = $this->useCarbon(
            $this->skeletonModel->createEntityUseCaseRequestMethods
        );

        return $this->skeletonModel;
    }

    public function create(): CreateEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new CreateEntityUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function withCreateCreateEntityUseCaseTestFileObject(
        FileObject $createCreateEntityUseCaseTestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->className = $createCreateEntityUseCaseTestFileObject->getClassName();
        $this->skeletonModel->namespace = $createCreateEntityUseCaseTestFileObject->getNamespace();
        $this->skeletonModel->shortName = $createCreateEntityUseCaseTestFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->createEntityClassName = $createEntityFileObject->getClassName();
        $this->skeletonModel->createEntityShortName = $createEntityFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityUseCaseRequestFileObject(
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {

        $this->skeletonModel->createEntityUseCaseRequestClassName = $createEntityUseCaseRequestFileObject->getClassName(
        );
        $this->skeletonModel->createEntityUseCaseRequestMethods = $createEntityUseCaseRequestFileObject->getMethods();
        $this->skeletonModel->createEntityUseCaseRequestShortName = $createEntityUseCaseRequestFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseAssemblerMockFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerMockFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {

        $this->skeletonModel->entityUseCaseDetailResponseAssemblerMockClassName = $entityUseCaseDetailResponseAssemblerMockFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerMockShortName = $entityUseCaseDetailResponseAssemblerMockFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseStubFileObject(
        FileObject $entityUseCaseDetailResponseStubFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseStubClassName = $entityUseCaseDetailResponseStubFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseStubShortName = $entityUseCaseDetailResponseStubFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseTestCaseFileObject(
        FileObject $entityUseCaseDetailResponseTestCaseFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseTestCaseClassName = $entityUseCaseDetailResponseTestCaseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseTestCaseShortName = $entityUseCaseDetailResponseTestCaseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityFactoryImplFileObject(
        FileObject $entityFactoryImplFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {

        $this->skeletonModel->entityFactoryImplClassName = $entityFactoryImplFileObject->getClassName();
        $this->skeletonModel->entityFactoryImplShortName = $entityFactoryImplFileObject->getShortName();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): CreateEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $this->skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();

        return $this;
    }

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

        return $this;
    }
}
