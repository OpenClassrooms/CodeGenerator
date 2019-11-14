<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestSkeletonModelBuilder;

class CreateEntityUseCaseTestSkeletonModelBuilderImpl implements CreateEntityUseCaseTestSkeletonModelBuilder
{
    /**
     * @var CreateEntityUseCaseTestSkeletonModel
     */
    private $skeletonModel;

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

    public function withCreateEntityUseCaseFileObject(FileObject $createEntityFileObject): CreateEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel->createEntityClassName = $createEntityFileObject->getClassName();
        $this->skeletonModel->createEntityShortName = $createEntityFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityUseCaseRequestFileObject(
        FileObject $createEntityRequestFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->createEntityRequestClassName = $createEntityRequestFileObject->getClassName();

        $this->skeletonModel->createEntityRequestShortName = $createEntityRequestFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityUseCaseRequestBuilderImplFileObject(
        FileObject $createEntityRequestBuilderImplFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->createEntityRequestBuilderImplClassName = $createEntityRequestBuilderImplFileObject->getClassName(
        );
        $this->skeletonModel->createEntityRequestBuilderImplMethods = $createEntityRequestBuilderImplFileObject->getMethods(
        );
        $this->skeletonModel->createEntityRequestBuilderImplShortName = $createEntityRequestBuilderImplFileObject->getShortName(
        );

        return $this;
    }

    public function withCreateEntityUseCaseRequestDTOFileObject(
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {

        $this->skeletonModel->createEntityRequestDTOClassName = $createEntityRequestDTOFileObject->getClassName();
        $this->skeletonModel->createEntityRequestDTOShortName = $createEntityRequestDTOFileObject->getShortName();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): CreateEntityUseCaseTestSkeletonModelBuilder
    {
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseFileObject(
        FileObject $entityDetailResponseFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseShortName = $entityDetailResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseAssemblerMockFileObject(
        FileObject $entityDetailResponseAssemblerMockFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {

        $this->skeletonModel->entityDetailResponseAssemblerMockClassName = $entityDetailResponseAssemblerMockFileObject->getClassName(
        );
        $this->skeletonModel->entityDetailResponseAssemblerMockShortName = $entityDetailResponseAssemblerMockFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseStubFileObject(
        FileObject $entityDetailResponseStubFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseStubClassName = $entityDetailResponseStubFileObject->getClassName();
        $this->skeletonModel->entityDetailResponseStubShortName = $entityDetailResponseStubFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseTestCaseFileObject(
        FileObject $entityDetailResponseTestCaseFileObject
    ): CreateEntityUseCaseTestSkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseTestCaseClassName = $entityDetailResponseTestCaseFileObject->getClassName(
        );
        $this->skeletonModel->entityDetailResponseTestCaseShortName = $entityDetailResponseTestCaseFileObject->getShortName(
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

    public function withEntityStubFileObject(FileObject $entityStubFileObject): CreateEntityUseCaseTestSkeletonModelBuilder
    {
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

    public function build(): CreateEntityUseCaseTestSkeletonModel
    {
        $this->skeletonModel->useCarbon = $this->useCarbon();

        return $this->skeletonModel;
    }

    private function useCarbon()
    {
        foreach ($this->skeletonModel->createEntityRequestBuilderImplMethods as $method){
            /** @var MethodObject $method */
            if($method->isDateType()) {
                return true;
            }
        }

        return false;
    }
}
