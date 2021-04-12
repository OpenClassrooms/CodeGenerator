<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    private CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler $createEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param CreateEntityUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityUseCaseRequestBuilderImplFileObject = $this->buildCreateEntityUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityUseCaseRequestBuilderImplFileObject);

        return $createEntityUseCaseRequestBuilderImplFileObject;
    }

    private function buildCreateEntityUseCaseRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityUseCaseRequestBuilderFileObject = $this->createCreateEntityUseCaseRequestBuilderFileObject();
        $createEntityUseCaseRequestBuilderImplFileObject = $this->createCreateEntityUseCaseRequestBuilderImplFileObject(
        );
        $createEntityUseCaseRequestDTOFileObject = $this->createCreateEntityUseCaseRequestDTOFileObject();
        $createEntityUseCaseRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();

        $createEntityUseCaseRequestBuilderImplFileObject->setMethods(
            MethodUtility::buildWitherMethods(
                $entityClassName,
                $createEntityUseCaseRequestBuilderFileObject->getShortName()
            )
        );

        $createEntityUseCaseRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $createEntityUseCaseRequestBuilderFileObject,
                $createEntityUseCaseRequestBuilderImplFileObject,
                $createEntityUseCaseRequestDTOFileObject,
                $createEntityUseCaseRequestFileObject
            )
        );

        return $createEntityUseCaseRequestBuilderImplFileObject;
    }

    private function createCreateEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER
        );
    }

    private function createCreateEntityUseCaseRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL
        );
    }

    private function createCreateEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST
        );
    }

    private function generateContent(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestBuilderImplFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $createEntityUseCaseRequestBuilderFileObject,
            $createEntityUseCaseRequestBuilderImplFileObject,
            $createEntityUseCaseRequestDTOFileObject,
            $createEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestBuilderImplFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseRequestBuilderImplSkeletonModel {
        return $this->createEntityUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $createEntityUseCaseRequestBuilderFileObject,
            $createEntityUseCaseRequestBuilderImplFileObject,
            $createEntityUseCaseRequestDTOFileObject,
            $createEntityUseCaseRequestFileObject
        );
    }

    public function setCreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
        CreateEntityUseCaseRequestBuilderImplSkeletonModelAssembler $createEntityUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->createEntityUseCaseRequestBuilderImplSkeletonModelAssembler = $createEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
