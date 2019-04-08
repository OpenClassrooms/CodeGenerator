<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCaseClassNameTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetFunctionalEntitySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetFunctionalEntitySkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetFunctionalEntitySkeletonModelBuilderImpl implements GetFunctionalEntitySkeletonModelBuilder
{
    use UseCaseClassNameTrait;

    /**
     * @var GetFunctionalEntitySkeletonModel
     */
    private $skeletonModel;

    public function create(): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel = new GetFunctionalEntitySkeletonModelImpl();

        return $this;
    }

    public function withEntity(FileObject $entityFileObject): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityArgument = lcfirst($entityFileObject->getEntity());
        $this->skeletonModel->functionalEntityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->functionalEntityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityGateway(FileObject $entityGatewayFileObject): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->functionalEntityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withGetEntityRequest(
        FileObject $getEntityRequestFileObject
    ): GetFunctionalEntitySkeletonModelBuilder
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

    public function withGetEntity(FileObject $getEntityFileObject): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel->shortName = $getEntityFileObject->getShortName();
        $this->skeletonModel->namespace = $getEntityFileObject->getNamespace();

        return $this;
    }

    public function withEntityDetailResponseAssembler(
        FileObject $entityDetailResponseAssemblerFileObject
    ): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityDetailResponseAssemblerClassName = $entityDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->functionalEntityDetailResponseAssemblerShortName = $entityDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityResponse(FileObject $entityResponseFileObject): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityResponseClassName = $entityResponseFileObject->getClassName();
        $this->skeletonModel->functionalEntityResponseShortName = $entityResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityNotFoundException(
        FileObject $entityNotFoundExceptionFileObjectFileObject
    ): GetFunctionalEntitySkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityNotFoundExceptionClassName = $entityNotFoundExceptionFileObjectFileObject->getClassName(
        );

        return $this;
    }

    public function build(): GetFunctionalEntitySkeletonModel
    {
        $useCaseRequestShortName = FileObjectUtility::getShortClassName($this->useCaseRequestClassName);
        $this->skeletonModel->useCaseRequestClassName = $this->useCaseRequestClassName;
        $this->skeletonModel->useCaseClassName = $this->useCaseClassName;
        $this->skeletonModel->useCaseRequestShortName = $useCaseRequestShortName;
        $this->skeletonModel->useCaseRequestArgument = lcfirst($useCaseRequestShortName);

        return $this->skeletonModel;
    }
}
