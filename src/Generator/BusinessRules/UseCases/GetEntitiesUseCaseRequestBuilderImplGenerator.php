<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler;

class GetEntitiesUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler
     */
    private $getEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler;

    private function buildGetEntitiesUseCaseRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntitiesUseCaseRequestBuilderImplFileObject = $this->createGetEntitiesUseCaseRequestBuilderImplFileObject();
        $getEntitiesUseCaseRequestBuilderFileObject = $this->createGetEntitiesUseCaseRequestBuilderFileObject();
        $getEntitiesUseCaseRequestDTOFileObject = $this->createGetEntitiesUseCaseRequestDTOFileObject();
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject();

        $getEntitiesUseCaseRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $getEntitiesUseCaseRequestBuilderImplFileObject,
                $getEntitiesUseCaseRequestBuilderFileObject,
                $getEntitiesUseCaseRequestDTOFileObject,
                $getEntitiesUseCaseRequestFileObject
            )
        );

        return $getEntitiesUseCaseRequestBuilderImplFileObject;
    }

    private function createGetEntitiesUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->createUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER
        );
    }

    private function createGetEntitiesUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->createUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_BUILDER_IMPL
        );
    }

    private function createGetEntitiesUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO
        );
    }

    private function createGetEntitiesUseCaseRequestFileObject(): FileObject
    {
        return $this->createUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST
        );
    }

    private function createSkeletonModel(
        FileObject $getEntitiesUseCaseRequestBuilderImplFileObject,
        FileObject $getEntitiesUseCaseRequestBuilderFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): GetEntitiesUseCaseRequestBuilderImplSkeletonModel {
        return $this->getEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $getEntitiesUseCaseRequestBuilderImplFileObject,
            $getEntitiesUseCaseRequestBuilderFileObject,
            $getEntitiesUseCaseRequestDTOFileObject,
            $getEntitiesUseCaseRequestFileObject
        );
    }

    private function createUseCaseRequestFileObject(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param GetEntitiesUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesUseCaseRequestBuilderImplFileObject = $this->buildGetEntitiesUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesUseCaseRequestBuilderImplFileObject);

        return $getEntitiesUseCaseRequestBuilderImplFileObject;
    }

    private function generateContent(
        FileObject $getEntitiesUseCaseRequestBuilderImplFileObject,
        FileObject $getEntitiesUseCaseRequestBuilderFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject,
        FileObject $getEntitiesUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $getEntitiesUseCaseRequestBuilderImplFileObject,
            $getEntitiesUseCaseRequestBuilderFileObject,
            $getEntitiesUseCaseRequestDTOFileObject,
            $getEntitiesUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setGetEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler(
        GetEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler $getEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->getEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler = $getEntitiesUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
