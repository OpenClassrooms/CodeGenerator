<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModelBuilder;

class GetEntityUseCaseTestSkeletonModelBuilderImpl implements GetEntityUseCaseTestSkeletonModelBuilder
{
    private GetEntityUseCaseTestSkeletonModelImpl $skeletonModel;

    public function build(FileObject $fileObject): GetEntityUseCaseTestSkeletonModel
    {
        $this->skeletonModel->entityShortName = $fileObject->getEntity();
        $this->skeletonModel->entityShortNameArgument = lcfirst($fileObject->getEntity());

        return $this->skeletonModel;
    }

    public function create(): GetEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntityUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName(
        );
        $this->skeletonModel->entityNotFoundExceptionShortName = $entityNotFoundExceptionFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $this->skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCaseFileObject(
        FileObject $getEntityUseCaseFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseClassName = $getEntityUseCaseFileObject->getClassName();
        $this->skeletonModel->getEntityUseCaseShortName = $getEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCaseRequestFileObject(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseRequestClassName = $getEntityUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->getEntityUseCaseRequestShortName = $getEntityUseCaseRequestFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCaseTestFileObject(
        FileObject $getEntityUseCaseTestFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->namespace = $getEntityUseCaseTestFileObject->getNamespace();
        $this->skeletonModel->shortName = $getEntityUseCaseTestFileObject->getShortName();

        return $this;
    }

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

        return $this;
    }

    public function withUseCaseDetailResponseAssemblerMockFileObject(
        FileObject $useCaseDetailResponseAssemblerMockFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseDetailResponseAssemblerMockClassName = $useCaseDetailResponseAssemblerMockFileObject->getClassName(
        );
        $this->skeletonModel->useCaseDetailResponseAssemblerMockShortName = $useCaseDetailResponseAssemblerMockFileObject->getShortName(
        );

        return $this;
    }

    public function withUseCaseDetailResponseStubFileObject(
        FileObject $useCaseDetailResponseStubFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseDetailResponseStubClassName = $useCaseDetailResponseStubFileObject->getClassName();
        $this->skeletonModel->useCaseDetailResponseStubShortName = $useCaseDetailResponseStubFileObject->getShortName();

        return $this;
    }

    public function withUseCaseDetailResponseTestCaseFileObject(
        FileObject $useCaseDetailResponseTestCaseFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseDetailResponseTestCaseClassName = $useCaseDetailResponseTestCaseFileObject->getClassName(
        );
        $this->skeletonModel->useCaseDetailResponseTestCaseShortName = $useCaseDetailResponseTestCaseFileObject->getShortName(
        );

        return $this;
    }
}
