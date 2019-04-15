<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitySkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntitySkeletonModelBuilderImpl implements GetEntitySkeletonModelBuilder
{
    use UseCaseClassNameTrait;

    /**
     * @var GetEntitySkeletonModel
     */
    private $skeletonModel;

    public function create(): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel = new GetEntitySkeletonModelImpl();

        return $this;
    }

    public function withEntity(FileObject $entityFileObject): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityArgument = lcfirst($entityFileObject->getEntity());
        $this->skeletonModel->functionalEntityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->functionalEntityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityGateway(FileObject $entityGatewayFileObject): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->functionalEntityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withGetEntityRequest(
        FileObject $getEntityRequestFileObject
    ): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->getFunctionalEntityRequestClassName = $getEntityRequestFileObject->getClassName();
        $this->skeletonModel->getFunctionalEntityRequestMethod = MethodUtility::getMethodName(
            $getEntityRequestFileObject->getMethods()
        );
        $this->skeletonModel->getFunctionalEntityRequestArgument = MethodUtility::createArgumentNameFromMethod(
            $this->skeletonModel->getFunctionalEntityRequestMethod
        );
        $this->skeletonModel->getFunctionalEntityRequestShortName = $getEntityRequestFileObject->getShortName();

        return $this;
    }

    public function withGetEntity(FileObject $getEntityFileObject): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->shortName = $getEntityFileObject->getShortName();
        $this->skeletonModel->namespace = $getEntityFileObject->getNamespace();

        return $this;
    }

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityDetailResponseAssemblerClassName = $entityDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->functionalEntityDetailResponseAssemblerShortName = $entityDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityResponse(FileObject $entityResponseFileObject): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityResponseClassName = $entityResponseFileObject->getClassName();
        $this->skeletonModel->functionalEntityResponseShortName = $entityResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundException(
        FileObject $entityNotFoundExceptionFileObjectFileObject
    ): GetEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityNotFoundExceptionClassName = $entityNotFoundExceptionFileObjectFileObject->getClassName(
        );

        return $this;
    }

    public function build(): GetEntitySkeletonModel
    {
        $useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestShortName = $useCaseRequestShortName;
        $this->skeletonModel->useCaseRequestArgument = lcfirst($useCaseRequestShortName);

        return $this->skeletonModel;
    }
}
