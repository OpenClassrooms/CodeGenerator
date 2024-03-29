<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\Request\InMemoryEntityGatewayGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewaySkeletonModelAssembler;

class InMemoryEntityGatewayGenerator extends AbstractGenerator
{
    private EntityFileObjectFactory $entityFileObjectFactory;

    private InMemoryEntityGatewaySkeletonModelAssembler $inMemoryEntityGatewaySkeletonModelAssembler;

    /**
     * @param InMemoryEntityGatewayGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $inMemoryEntityGatewayFileObject = $this->buildInMemoryEntityGatewayFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($inMemoryEntityGatewayFileObject);

        return $inMemoryEntityGatewayFileObject;
    }

    private function buildInMemoryEntityGatewayFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);

        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $inMemoryEntityGatewayFileObject = $this->createInMemoryEntityGatewayFileObject();

        $inMemoryEntityGatewayFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $entityGatewayFileObject,
                $entityNotFoundExceptionFileObject,
                $inMemoryEntityGatewayFileObject
            )
        );

        return $inMemoryEntityGatewayFileObject;
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY);
    }

    private function createFileObject(string $type): FileObject
    {
        return $this->entityFileObjectFactory->create($type, $this->domain, $this->entity, $this->baseNamespace);
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY);
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION);
    }

    private function createInMemoryEntityGatewayFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_IN_MEMORY_GATEWAY);
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $inMemoryEntityGatewayFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject,
            $inMemoryEntityGatewayFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $inMemoryEntityGatewayFileObject
    ): InMemoryEntityGatewaySkeletonModel {
        return $this->inMemoryEntityGatewaySkeletonModelAssembler->create(
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject,
            $inMemoryEntityGatewayFileObject
        );
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $factory): void
    {
        $this->entityFileObjectFactory = $factory;
    }

    public function setInMemoryEntityGatewaySkeletonModelAssembler(
        InMemoryEntityGatewaySkeletonModelAssembler $assembler
    ): void {
        $this->inMemoryEntityGatewaySkeletonModelAssembler = $assembler;
    }
}
