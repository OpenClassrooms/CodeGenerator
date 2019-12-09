<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseSkeletonModelBuilder;

class CreateEntityUseCaseSkeletonModelBuilderImpl implements CreateEntityUseCaseSkeletonModelBuilder
{
    use UseCaseClassNameTrait;

    /**
     * @var CreateEntityUseCaseSkeletonModel
     */
    private $skeletonModel;

    public function build(): CreateEntityUseCaseSkeletonModel
    {
        $this->skeletonModel->transactionClassName = $this->transactionClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;

        return $this->skeletonModel;
    }

    public function create(): CreateEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel = new CreateEntityUseCaseSkeletonModelImpl();

        return $this;
    }

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->className = $createEntityFileObject->getClassName();
        $this->skeletonModel->namespace = $createEntityFileObject->getNamespace();
        $this->skeletonModel->shortName = $createEntityFileObject->getShortName();

        return $this;
    }

    public function withCreateEntityUseCaseRequest(
        FileObject $createFunctionalEntityRequestFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->createEntityUseCaseRequestArgument = lcfirst(
            $createFunctionalEntityRequestFileObject->getShortName()
        );
        $this->skeletonModel->createEntityUseCaseRequestClassName = $createFunctionalEntityRequestFileObject->getClassName(
        );
        $this->skeletonModel->createEntityUseCaseRequestMethods = $createFunctionalEntityRequestFileObject->getMethods(
        );
        $this->skeletonModel->createEntityUseCaseRequestShortName = $createFunctionalEntityRequestFileObject->getShortName(
        );

        return $this;
    }

    public function withEntity(FileObject $entityFileObject): CreateEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->entityArgument = lcfirst($entityFileObject->getShortName());
        $this->skeletonModel->entityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponse(
        FileObject $entityUseCaseDetailResponseFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityDetailResponseAssembler(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): CreateEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerArgument = lcfirst(
            $entityUseCaseDetailResponseAssemblerFileObject->getShortName()
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerClassName = $entityUseCaseDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerShortName = $entityUseCaseDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityFactory(FileObject $entityFactoryFileObject): CreateEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->entityFactoryArgument = lcfirst($entityFactoryFileObject->getShortName());
        $this->skeletonModel->entityFactoryClassName = $entityFactoryFileObject->getClassName();
        $this->skeletonModel->entityFactoryShortName = $entityFactoryFileObject->getShortName();

        return $this;
    }

    public function withEntityGateway(FileObject $entityGatewayFileObject): CreateEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->entityGatewayArgument = lcfirst($entityGatewayFileObject->getShortName());
        $this->skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }
}
