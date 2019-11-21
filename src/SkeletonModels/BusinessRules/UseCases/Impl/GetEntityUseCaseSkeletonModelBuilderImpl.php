<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
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

    public function withEntityClassName(FileObject $entityFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->functionalEntityArgument = lcfirst($entityFileObject->getEntity());
        $this->skeletonModel->functionalEntityClassName = $entityFileObject->getClassName();
        $this->skeletonModel->functionalEntityShortName = $entityFileObject->getShortName();

        return $this;
    }

    public function withEntityClassNameDetailResponse(
        FileObject $entityUseCaseDetailResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->functionalEntityDetailResponseClassName = $entityUseCaseDetailResponseFileObject->getClassName();
        $this->skeletonModel->functionalEntityDetailResponseShortName = $entityUseCaseDetailResponseFileObject->getShortName();

        return $this;
    }

    public function withEntityClassNameDetailResponseAssembler(
        FileObject $entityUseCaseDetailResponseAssemblerFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->functionalEntityDetailResponseAssemblerClassName = $entityUseCaseDetailResponseAssemblerFileObject->getClassName(
        );
        $this->skeletonModel->functionalEntityDetailResponseAssemblerShortName = $entityUseCaseDetailResponseAssemblerFileObject->getShortName(
        );

        return $this;
    }

    public function withEntityClassNameGateway(
        FileObject $entityGatewayFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->functionalEntityGatewayClassName = $entityGatewayFileObject->getClassName();
        $this->skeletonModel->functionalEntityGatewayShortName = $entityGatewayFileObject->getShortName();

        return $this;
    }

    public function withEntityClassNameNotFoundException(
        FileObject $entityNotFoundExceptionFileObjectFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->functionalEntityNotFoundExceptionClassName = $entityNotFoundExceptionFileObjectFileObject->getClassName(
        );

        return $this;
    }

    public function withEntityClassNameResponse(
        FileObject $entityResponseFileObject
    ): GetEntityUseCaseSkeletonModelBuilder {
        $this->skeletonModel->functionalEntityResponseClassName = $entityResponseFileObject->getClassName();
        $this->skeletonModel->functionalEntityResponseShortName = $entityResponseFileObject->getShortName();

        return $this;
    }

    public function withGetEntityUseCase(FileObject $getEntityFileObject): GetEntityUseCaseSkeletonModelBuilder
    {
        $this->skeletonModel->shortName = $getEntityFileObject->getShortName();
        $this->skeletonModel->namespace = $getEntityFileObject->getNamespace();

        return $this;
    }

    public function withGetEntityUseCaseRequest(
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
