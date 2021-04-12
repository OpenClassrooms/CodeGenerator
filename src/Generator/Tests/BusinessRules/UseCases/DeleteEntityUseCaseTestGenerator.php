<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\Request\DeleteEntityUseCaseTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestSkeletonModelBuilder;

class DeleteEntityUseCaseTestGenerator extends AbstractUseCaseGenerator
{
    private DeleteEntityUseCaseTestSkeletonModelBuilder $deleteEntityUseCaseTestSkeletonModelBuilder;

    /**
     * @param DeleteEntityUseCaseTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityUseCaseTestFileObject = $this->buildDeleteEntityUseCaseTestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityUseCaseTestFileObject);

        return $deleteEntityUseCaseTestFileObject;
    }

    private function buildDeleteEntityUseCaseTestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityUseCaseFileObject = $this->createDeleteEntityUseCaseFileObject();
        $deleteEntityUseCaseTestFileObject = $this->createDeleteEntityUseCaseTestFileObject();
        $deleteEntityUseCaseRequestFileObject = $this->createDeleteEntityUseCaseRequestFileObject();
        $deleteEntityUseCaseRequestBuilderImplFileObject = $this->createDeleteEntityUseCaseRequestBuilderImplFileObject(
        );
        $deleteEntityUseCaseRequestDTOFileObject = $this->createDeleteEntityUseCaseRequestDTOFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityStubFileObject = $this->createEntityStubFileObject();
        $inMemoryEntityGatewayFileObject = $this->createInMemoryEntityGatewayFileObject();

        $deleteEntityUseCaseTestFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE                             => $deleteEntityUseCaseFileObject,
                    UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_TEST                        => $deleteEntityUseCaseTestFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST              => $deleteEntityUseCaseRequestFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL => $deleteEntityUseCaseRequestBuilderImplFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_DTO          => $deleteEntityUseCaseRequestDTOFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                          => $entityNotFoundExceptionFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB                                         => $entityStubFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY                            => $inMemoryEntityGatewayFileObject,
                ]
            )
        );

        return $deleteEntityUseCaseTestFileObject;
    }

    private function createDeleteEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseTestFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_TEST,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityStubFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $this->domain,
            $this->entity
        );
    }

    private function createInMemoryEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(array $fileObjects): DeleteEntityUseCaseTestSkeletonModel
    {
        return $this->deleteEntityUseCaseTestSkeletonModelBuilder
            ->create()
            ->withDeleteEntityUseCaseFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE]
            )
            ->withDeleteEntityUseCaseTestFileObject(
                $fileObjects[UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_TEST]
            )
            ->withDeleteEntityUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST]
            )
            ->withDeleteEntityUseCaseRequestBuilderImplFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL]
            )
            ->withDeleteEntityUseCaseRequestDTOFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_DTO]
            )
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityStubFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB])
            ->withInMemoryEntityGatewayFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY]
            )
            ->build();
    }

    public function setDeleteEntityUseCaseTestSkeletonModelBuilder(
        DeleteEntityUseCaseTestSkeletonModelBuilder $deleteEntityUseCaseTestSkeletonModelBuilder
    ): void {
        $this->deleteEntityUseCaseTestSkeletonModelBuilder = $deleteEntityUseCaseTestSkeletonModelBuilder;
    }
}
