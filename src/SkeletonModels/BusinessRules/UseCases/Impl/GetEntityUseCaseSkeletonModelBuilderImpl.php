<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseSkeletonModelBuilderImpl implements GetEntityUseCaseSkeletonModelBuilder
{
    use UseCaseClassNameTrait;

    /**
     * @var GetEntityUseCaseSkeletonModel
     */
    private $skeletonModel;

    public function create(): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntityUseCaseSkeletonModelImpl();

        return $this;
    }

    public function withEntity(FileObject $entityFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityArgument = lcfirst($entityFileObject->getEntity());
        $this->skeletonModel->functionalEntityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->functionalEntityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityGateway(FileObject $entityGatewayFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->functionalEntityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCaseRequest(
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->getEntityUseCaseRequestClassName = $getEntityUseCaseRequestFileObject->getClassName();
        $this->skeletonModel->getEntityUseCaseRequestMethod = MethodUtility::getMethodName(
            $getEntityUseCaseRequestFileObject->getMethods()
        );
        $this->skeletonModel->getEntityUseCaseRequestArgument = MethodUtility::createArgumentNameFromMethod(
            $this->skeletonModel->getEntityUseCaseRequestMethod
        );
        $this->skeletonModel->getEntityUseCaseRequestShortName = $getEntityUseCaseRequestFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCase(FileObject $getEntityFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->shortName = $getEntityFileObject->getShortName();
        $this->skeletonModel->namespace = $getEntityFileObject->getNamespace();

        return $this;
    }

    public function withEntityDetailResponse(
        FileObject $entityDetailResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityDetailResponseClassName = $entityDetailResponseFileObject->getClassName();
        $this->skeletonModel->functionalEntityDetailResponseShortName = $entityDetailResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityDetailResponseAssemblerClassName = $entityDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->functionalEntityDetailResponseAssemblerShortName = $entityDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityResponse(FileObject $entityResponseFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityResponseClassName = $entityResponseFileObject->getClassName();
        $this->skeletonModel->functionalEntityResponseShortName = $entityResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundException(
        FileObject $entityNotFoundExceptionFileObjectFileObject
    ): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityNotFoundExceptionClassName = $entityNotFoundExceptionFileObjectFileObject->getClassName(
        );

        return $this;
    }

    public function build(): GetEntityUseCaseSkeletonModel
    {
        $useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestShortName = $useCaseRequestShortName;
        $this->skeletonModel->useCaseRequestArgument = lcfirst($useCaseRequestShortName);

        return $this->skeletonModel;
    }
}
