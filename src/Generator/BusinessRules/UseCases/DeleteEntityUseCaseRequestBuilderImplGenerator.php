<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

class DeleteEntityUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    private DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler $deleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param DeleteEntityUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityUseCaseRequestBuilderImplFileObject = $this->buildDeleteEntityUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityUseCaseRequestBuilderImplFileObject);

        return $deleteEntityUseCaseRequestBuilderImplFileObject;
    }

    private function buildDeleteEntityUseCaseRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityUseCaseRequestBuilderImplFileObject = $this->createDeleteEntityUseCaseRequestBuilderImplFileObject(
        );
        $deleteEntityUseCaseRequestBuilderFileObject = $this->createDeleteEntityUseCaseRequestBuilderFileObject();
        $deleteEntityUseCaseRequestDTOFileObject = $this->createDeleteEntityUseCaseRequestDTOFileObject();
        $deleteEntityUseCaseRequestFileObject = $this->createDeleteEntityUseCaseRequestFileObject();

        $deleteEntityUseCaseRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $deleteEntityUseCaseRequestBuilderFileObject,
                $deleteEntityUseCaseRequestBuilderImplFileObject,
                $deleteEntityUseCaseRequestDTOFileObject,
                $deleteEntityUseCaseRequestFileObject
            )
        );

        return $deleteEntityUseCaseRequestBuilderImplFileObject;
    }

    private function createDeleteEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->createDeleteUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL
        );
    }

    private function createDeleteUseCaseRequestFileObject(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->createDeleteUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER
        );
    }

    private function createDeleteEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createDeleteUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function createDeleteEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->createDeleteUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST
        );
    }

    private function generateContent(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestBuilderImplFileObject,
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $deleteEntityUseCaseRequestBuilderFileObject,
            $deleteEntityUseCaseRequestBuilderImplFileObject,
            $deleteEntityUseCaseRequestDTOFileObject,
            $deleteEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $deleteEntityUseCaseRequestBuilderFileObject,
        FileObject $deleteEntityUseCaseRequestBuilderImplFileObject,
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestBuilderImplSkeletonModel {
        return $this->deleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $deleteEntityUseCaseRequestBuilderFileObject,
            $deleteEntityUseCaseRequestBuilderImplFileObject,
            $deleteEntityUseCaseRequestDTOFileObject,
            $deleteEntityUseCaseRequestFileObject
        );
    }

    public function setDeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
        DeleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler $deleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->deleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler = $deleteEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
