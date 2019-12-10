<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\EditEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\EditEntityUseCaseTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;

class EditEntityUseCaseTestSkeletonModelBuilderImpl implements EditEntityUseCaseTestSkeletonModelBuilder
{
    use CrudSkeletonModelBuilderTrait;

    private $entityUtilClassName;

    /**
     * @var EditEntityUseCaseTestSkeletonModel
     */
    private $skeletonModel;

    public function build(): EditEntityUseCaseTestSkeletonModel
    {
        $this->skeletonModel->entityUtilClassName = $this->entityUtilClassName;
        $this->skeletonModel->useCarbon = $this->useCarbon(
            $this->skeletonModel->editEntityUseCaseRequestBuilderImplMethods
        );

        return $this->skeletonModel;
    }

    public function create(): EditEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel = new EditEntityUseCaseTestSkeletonModelImpl();

        return $this;
    }

    public function setEntityUtilClassName($entityUtilClassName): void
    {
        $this->entityUtilClassName = $entityUtilClassName;
    }

    public function withEditEntityUseCaseFileObject(
        FileObject $editEntityUseCaseFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseClassName = $editEntityUseCaseFileObject->getClassName();
        $this->skeletonModel->editEntityUseCaseShortName = $editEntityUseCaseFileObject->getShortName();

        return $this;
    }

    public function withEditEntityUseCaseRequestBuilderImplFileObject(
        FileObject $editEntityUseCaseRequestBuilderImplFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseRequestBuilderImplMethods = $editEntityUseCaseRequestBuilderImplFileObject->getMethods(
        );
        $this->skeletonModel->editEntityUseCaseRequestBuilderImplClassName = $editEntityUseCaseRequestBuilderImplFileObject->getClassName(
        );
        $this->skeletonModel->editEntityUseCaseRequestBuilderImplShortName = $editEntityUseCaseRequestBuilderImplFileObject->getShortName(
        );

        return $this;
    }

    public function withEditEntityUseCaseRequestDTOFileObject(
        FileObject $editEntityUseCaseRequestDTOFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseRequestDTOClassName = $editEntityUseCaseRequestDTOFileObject->getClassName(
        );
        $this->skeletonModel->editEntityUseCaseRequestDTOShortName = $editEntityUseCaseRequestDTOFileObject->getShortName(
        );

        return $this;
    }

    public function withEditEntityUseCaseRequestFileObject(
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->editEntityUseCaseRequestClassName = $editEntityUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->editEntityUseCaseRequestShortName = $editEntityUseCaseRequestFileObject->getShortName();

        return $this;
    }

    public function withEditEntityUseCaseTestFileObject(
        FileObject $editEntityUseCaseTestFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->className = $editEntityUseCaseTestFileObject->getClassName();
        $this->skeletonModel->namespace = $editEntityUseCaseTestFileObject->getNamespace();
        $this->skeletonModel->shortName = $editEntityUseCaseTestFileObject->getShortName();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): EditEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $this->skeletonModel->entityIdArgument = NameUtility::createEntityIdName($entityFileObject->getShortName());
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObject->getClassName();

        return $this;
    }

    public function withEntityStubFileObject(
        FileObject $entityStubFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $this->skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();

        return $this;
    }

    public function withEntityUseCaseDetailResponseAssemblerMockFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerMockFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerMockClassName = $entityUseCaseDetailResponseAssemblerMockFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerMockShortName = $entityUseCaseDetailResponseAssemblerMockFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityUseCaseDetailResponseStubFileObject(
        FileObject $entityUseCaseDetailResponseStubFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseStubClassName = $entityUseCaseDetailResponseStubFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseStubShortName = $entityUseCaseDetailResponseStubFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityUseCaseDetailResponseTestCaseFileObject(
        FileObject $entityUseCaseDetailResponseTestCaseFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseTestCaseClassName = $entityUseCaseDetailResponseTestCaseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseTestCaseShortName = $entityUseCaseDetailResponseTestCaseFileObject->getShortName(
        );

        return $this;
    }

    public function withInMemoryEntityUseCaseGatewayFileObject(
        FileObject $inMemoryEntityUseCaseGatewayFileObject
    ): EditEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityUseCaseGatewayClassName = $inMemoryEntityUseCaseGatewayFileObject->getClassName(
        );
        $this->skeletonModel->inMemoryEntityUseCaseGatewayShortName = $inMemoryEntityUseCaseGatewayFileObject->getShortName(
        );

        return $this;
    }
}
