<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntityUseCaseTestSkeletonModelBuilder;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseTestSkeletonModelBuilderImpl implements GetEntityUseCaseTestSkeletonModelBuilder
{
    /**
     * @var GetEntityUseCaseTestSkeletonModel
     */
    private $skeletonModel;

    public function create(): GetEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntityUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function withEntityStubFileObject(FileObject $entityStubFileObject): GetEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $this->skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionFileObjectClassName = $entityNotFoundExceptionFileObject->getClassName(
        );
        $this->skeletonModel->entityNotFoundExceptionFileObjectShortName = $entityNotFoundExceptionFileObject->getShortName(
        );

        return $this;
    }

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCaseFileObject(
        FileObject $getEntityUseCaseFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseClassName = $getEntityUseCaseFileObject->getClassName();
        $this->skeletonModel->getEntityUseCaseShortName = $getEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCaseRequestBuilderImplFileObject(
        FileObject $getEntityUseCaseRequestBuilderImplFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseRequestBuilderImplClassName = $getEntityUseCaseRequestBuilderImplFileObject->getClassName(
        );
        $this->skeletonModel->getEntityUseCaseRequestBuilderImplShortName = $getEntityUseCaseRequestBuilderImplFileObject->getShortName(
        );

        return $this;
    }

    public function withGetEntityUseCaseRequestDTOFileObject(
        FileObject $getEntityUseCaseRequestDTOFileObject
    ): GetEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseRequestDTOClassName = $getEntityUseCaseRequestDTOFileObject->getClassName(
        );
        $this->skeletonModel->getEntityUseCaseRequestDTOShortName = $getEntityUseCaseRequestDTOFileObject->getShortName(
        );

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

    public function build(FileObject $fileObject): GetEntityUseCaseTestSkeletonModel
    {
        $this->skeletonModel->entityShortName = $fileObject->getEntity();
        $this->skeletonModel->entityShortNameLcFirst = lcfirst($fileObject->getEntity());

        return $this->skeletonModel;
    }
}
