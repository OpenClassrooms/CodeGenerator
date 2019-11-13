<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\CreateEntityTestSkeletonModelBuilder;

class CreateEntityTestSkeletonModelBuilderImpl implements CreateEntityTestSkeletonModelBuilder
{
    /**
     * @var CreateEntityTestSkeletonModel
     */
    private $skeletonModel;

    public function create(): CreateEntityTestSkeletonModelBuilder
    {
        $this->skeletonModel = new CreateEntityTestSkeletonModelImpl();

        return $this;
    }

    public function withCreateCreateEntityTestFileObject(
        FileObject $createCreateEntityTestFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->className = $createCreateEntityTestFileObject->getClassName();
        $this->skeletonModel->namespace = $createCreateEntityTestFileObject->getNamespace();
        $this->skeletonModel->shortName = $createCreateEntityTestFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityFileObject(FileObject $createEntityFileObject): CreateEntityTestSkeletonModelBuilder
    {
        $this->skeletonModel->createEntityClassName = $createEntityFileObject->getClassName();
        $this->skeletonModel->createEntityShortName = $createEntityFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityRequestFileObject(
        FileObject $createEntityRequestFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->createEntityRequestClassName = $createEntityRequestFileObject->getClassName();

        $this->skeletonModel->createEntityRequestShortName = $createEntityRequestFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityRequestBuilderImplFileObject(
        FileObject $createEntityRequestBuilderImplFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->createEntityRequestBuilderImplClassName = $createEntityRequestBuilderImplFileObject->getClassName(
        );
        $this->skeletonModel->createEntityRequestBuilderImplMethods = $createEntityRequestBuilderImplFileObject->getMethods(
        );
        $this->skeletonModel->createEntityRequestBuilderImplShortName = $createEntityRequestBuilderImplFileObject->getShortName(
        );

        return $this;
    }

    public function withCreateEntityRequestDTOFileObject(
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityTestSkeletonModelBuilder {

        $this->skeletonModel->createEntityRequestDTOClassName = $createEntityRequestDTOFileObject->getClassName();
        $this->skeletonModel->createEntityRequestDTOShortName = $createEntityRequestDTOFileObject->getShortName();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): CreateEntityTestSkeletonModelBuilder
    {
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseFileObject(
        FileObject $entityDetailResponseFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseShortName = $entityDetailResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseAssemblerMockFileObject(
        FileObject $entityDetailResponseAssemblerMockFileObject
    ): CreateEntityTestSkeletonModelBuilder {

        $this->skeletonModel->entityDetailResponseAssemblerMockClassName = $entityDetailResponseAssemblerMockFileObject->getClassName(
        );
        $this->skeletonModel->entityDetailResponseAssemblerMockShortName = $entityDetailResponseAssemblerMockFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseStubFileObject(
        FileObject $entityDetailResponseStubFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseStubClassName = $entityDetailResponseStubFileObject->getClassName();
        $this->skeletonModel->entityDetailResponseStubShortName = $entityDetailResponseStubFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseTestCaseFileObject(
        FileObject $entityDetailResponseTestCaseFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseTestCaseClassName = $entityDetailResponseTestCaseFileObject->getClassName(
        );
        $this->skeletonModel->entityDetailResponseTestCaseShortName = $entityDetailResponseTestCaseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityFactoryImplFileObject(
        FileObject $entityFactoryImplFileObject
    ): CreateEntityTestSkeletonModelBuilder {

        $this->skeletonModel->entityFactoryImplClassName = $entityFactoryImplFileObject->getClassName();
        $this->skeletonModel->entityFactoryImplShortName = $entityFactoryImplFileObject->getShortName();

        return $this;
    }

    public function withEntityStubFileObject(FileObject $entityStubFileObject): CreateEntityTestSkeletonModelBuilder
    {
        $this->skeletonModel->entityStubClassName = $entityStubFileObject->getClassName();
        $this->skeletonModel->entityStubShortName = $entityStubFileObject->getShortName();

        return $this;
    }

    public function withInMemoryEntityGatewayFileObject(
        FileObject $inMemoryEntityGatewayFileObject
    ): CreateEntityTestSkeletonModelBuilder {
        $this->skeletonModel->inMemoryEntityGatewayClassName = $inMemoryEntityGatewayFileObject->getClassName();
        $this->skeletonModel->inMemoryEntityGatewayShortName = $inMemoryEntityGatewayFileObject->getShortName();

        return $this;
    }

    public function build(): CreateEntityTestSkeletonModel
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
