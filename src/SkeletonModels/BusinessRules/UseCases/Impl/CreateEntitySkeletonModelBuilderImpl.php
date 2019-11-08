<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntitySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntitySkeletonModelBuilder;

class CreateEntitySkeletonModelBuilderImpl implements CreateEntitySkeletonModelBuilder
{
    use UseCaseClassNameTrait;

    /**
     * @var CreateEntitySkeletonModel
     */
    private $skeletonModel;

    public function create(): CreateEntitySkeletonModelBuilder
    {
        $this->skeletonModel = new CreateEntitySkeletonModelImpl();

        return $this;
    }

    public function withCreateEntityFileObject(FileObject $createEntityFileObject): CreateEntitySkeletonModelBuilder
    {
        $this->skeletonModel->className = $createEntityFileObject->getClassName();
        $this->skeletonModel->namespace = $createEntityFileObject->getNamespace();
        $this->skeletonModel->shortName = $createEntityFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityRequest(
        FileObject $createFunctionalEntityRequestFileObject
    ): CreateEntitySkeletonModelBuilder {
        $this->skeletonModel->createEntityRequestArgument = lcfirst(
            $createFunctionalEntityRequestFileObject->getShortName()
        );
        $this->skeletonModel->createEntityRequestClassName = $createFunctionalEntityRequestFileObject->getClassName();
        $this->skeletonModel->createEntityRequestMethods = $createFunctionalEntityRequestFileObject->getMethods();
        $this->skeletonModel->createEntityRequestShortName = $createFunctionalEntityRequestFileObject->getShortName();

        return $this;
    }

    public function withEntity(FileObject $entityFileObject): CreateEntitySkeletonModelBuilder
    {
        $this->skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $this->skeletonModel->entityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponse(
        FileObject $entityDetailResponseFileObject
    ): CreateEntitySkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseClassName = $entityDetailResponseFileObject->getClassName();
        $this->skeletonModel->entityDetailResponseShortName = $entityDetailResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): CreateEntitySkeletonModelBuilder {
        $this->skeletonModel->entityDetailResponseAssemblerArgument = lcfirst($entityDetailResponseAssemblerFileObject->getShortName());
        $this->skeletonModel->entityDetailResponseAssemblerClassName = $entityDetailResponseAssemblerFileObject->getClassName();
        $this->skeletonModel->entityDetailResponseAssemblerShortName = $entityDetailResponseAssemblerFileObject->getShortName();

        return $this;
    }

    public function withEntityFactory(FileObject $entityFactoryFileObject): CreateEntitySkeletonModelBuilder
    {
        $this->skeletonModel->entityFactoryArgument = lcfirst($entityFactoryFileObject->getShortName());
        $this->skeletonModel->entityFactoryClassName = $entityFactoryFileObject->getClassName();
        $this->skeletonModel->entityFactoryShortName = $entityFactoryFileObject->getShortName();

        return $this;
    }

    public function withEntityGateway(FileObject $entityGatewayFileObject): CreateEntitySkeletonModelBuilder
    {
        $this->skeletonModel->entityGatewayArgument = lcfirst($entityGatewayFileObject->getShortName());
        $this->skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function build(): CreateEntitySkeletonModel
    {
        $this->skeletonModel->transactionClassName = $this->transactionClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $this->skeletonModel;
    }
}
