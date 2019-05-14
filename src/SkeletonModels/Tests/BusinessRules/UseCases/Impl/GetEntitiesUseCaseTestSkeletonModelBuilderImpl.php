<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitiesUseCaseTestSkeletonModelBuilderImpl implements GetEntitiesUseCaseTestSkeletonModelBuilder
{
    /**
     * @var GetEntitiesUseCaseTestSkeletonModel
     */
    private $skeletonModel;

    public function create(): GetEntitiesUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntitiesUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): GetEntitiesUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel->entitiesArgument = StringUtility::pluralize(lcfirst($entityFileObject->getShortName()));
        $this->skeletonModel->entitiesShortName = StringUtility::pluralize($entityFileObject->getShortName());

        return $this;
    }

    public function withEntityGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withEntityStub1FileObject(
        FileObject $entityStub1FileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityStub1ClassName = $entityStub1FileObject->getClassName();
        $this->skeletonModel->entityStub1ShortName = $entityStub1FileObject->getShortName();

        return $this;
    }

    public function withEntityStub2FileObject(
        FileObject $entityStub2FileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityStub2ClassName = $entityStub2FileObject->getClassName();
        $this->skeletonModel->entityStub2ShortName = $entityStub2FileObject->getShortName();

        return $this;
    }

    public function withGetEntitiesUseCaseFileObject(
        FileObject $getEntitiesUseCaseFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseClassName = $getEntitiesUseCaseFileObject->getClassName();
        $this->skeletonModel->getEntitiesUseCaseShortName = $getEntitiesUseCaseFileObject->getShortName();

        return $this;
    }

    public function withGetEntitiesUseCaseRequestFileObject(
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->getEntitiesUseCaseRequestClassName = $getEntitiesUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->getEntitiesUseCaseRequestShortName = $getEntitiesUseCaseRequestFileObject->getShortName();

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

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

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

    public function withUseCaseListItemResponseStub1FileObject(
        FileObject $useCaseListItemResponseStub1FileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseStub1ClassName = $useCaseListItemResponseStub1FileObject->getClassName(
        );
        $this->skeletonModel->useCaseListItemResponseStub1ShortName = $useCaseListItemResponseStub1FileObject->getShortName(
        );

        return $this;
    }

    public function withUseCaseListItemResponseStub2FileObject(
        FileObject $useCaseListItemResponseStub2FileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->useCaseListItemResponseStub2ClassName = $useCaseListItemResponseStub2FileObject->getClassName(
        );
        $this->skeletonModel->useCaseListItemResponseStub2ShortName = $useCaseListItemResponseStub2FileObject->getShortName(
        );

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

    public function withGetEntitiesUseCaseTestFileObject(
        FileObject $getEntitiesUseCaseTestFileObject
    ): GetEntitiesUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->namespace = $getEntitiesUseCaseTestFileObject->getNamespace();
        $this->skeletonModel->shortName = $getEntitiesUseCaseTestFileObject->getShortName();

        return $this;
    }

    public function build(): GetEntitiesUseCaseTestSkeletonModel
    {
        return $this->skeletonModel;
    }
}
