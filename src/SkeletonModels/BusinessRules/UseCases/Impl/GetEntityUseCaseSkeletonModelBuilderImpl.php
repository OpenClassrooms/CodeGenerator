<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class GetEntityUseCaseSkeletonModelBuilderImpl implements GetEntityUseCaseSkeletonModelBuilder
{
    use UseCaseClassNameTrait;

    /**
     * @var GetEntityUseCaseSkeletonModel
     */
    private $skeletonModel;

    public function build(): GetEntityUseCaseSkeletonModel
    {
        $useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestShortName = $useCaseRequestShortName;
        $this->skeletonModel->useCaseRequestArgument = lcfirst($useCaseRequestShortName);

        return $this->skeletonModel;
    }

    public function create(): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntityUseCaseSkeletonModelImpl();

        return $this;
    }

    public function withEntityFileObject(FileObject $entityFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->entityArgument = lcfirst($entityFileObject->getEntity());
        $this->skeletonModel->entityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->entityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityUseCaseDetailResponseAssemblerFileObject(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerClassName = $entityUseCaseDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->entityUseCaseDetailResponseAssemblerShortName = $entityUseCaseDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityGatewayFileObject(
        FileObject $entityGatewayFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->entityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObjectFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->entityNotFoundExceptionClassName = $entityNotFoundExceptionFileObjectFileObject->getClassName(
        );

        return $this;
    }

    public function withGetEntityUseCaseFileObject(FileObject $getEntityFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->shortName = $getEntityFileObject->getShortName();
        $this->skeletonModel->namespace = $getEntityFileObject->getNamespace();

        return $this;
    }

    public function withGetEntityUseCaseRequestFileObject(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->getEntityUseCaseRequestClassName = $getEntityUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->getEntityUseCaseRequestAccessor = $this->getRequestAccessor(
            $getEntityUseCaseRequestFileObject->getEntity()
        );
        $this->skeletonModel->getEntityUseCaseRequestArgument = MethodUtility::createArgumentNameFromMethod(
            $this->skeletonModel->getEntityUseCaseRequestAccessor
        );
        $this->skeletonModel->getEntityUseCaseRequestShortName = $getEntityUseCaseRequestFileObject->getShortName();

        return $this;
    }

    private function getRequestAccessor(string $entityShortName): string
    {
        return lcfirst($entityShortName) . 'Id';
    }
}
