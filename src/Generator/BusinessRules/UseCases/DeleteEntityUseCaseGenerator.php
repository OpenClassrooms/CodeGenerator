<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseSkeletonModelAssembler;

class DeleteEntityUseCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var DeleteEntityUseCaseSkeletonModelAssembler
     */
    private $deleteEntityUseCaseSkeletonModelAssembler;

    /**
     * @param DeleteEntityUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityUseCaseFileObject = $this->buildDeleteEntityUseCaseFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityUseCaseFileObject);

        return $deleteEntityUseCaseFileObject;
    }

    private function buildDeleteEntityUseCaseFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityUseCaseFileObject = $this->createDeleteEntityUseCaseFileObject();
        $deleteEntityUseCaseRequestFileObject = $this->createEntityUseCaseEntityRequestFileObject();
        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();

        $deleteEntityUseCaseFileObject->setContent(
            $this->generateContent(
                $deleteEntityUseCaseFileObject,
                $deleteEntityUseCaseRequestFileObject,
                $entityFileObject,
                $entityGatewayFileObject,
                $entityNotFoundExceptionFileObject
            )
        );

        return $deleteEntityUseCaseFileObject;
    }

    private function createDeleteEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseEntityRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
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

    private function generateContent(
        FileObject $deleteEntityUseCaseFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject,
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $deleteEntityUseCaseFileObject,
            $deleteEntityUseCaseRequestFileObject,
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $deleteEntityUseCaseFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject,
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): DeleteEntityUseCaseSkeletonModel {
        return $this->deleteEntityUseCaseSkeletonModelAssembler->create(
            $deleteEntityUseCaseFileObject,
            $deleteEntityUseCaseRequestFileObject,
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject
        );
    }

    public function setDeleteEntityUseCaseSkeletonModelAssembler(
        DeleteEntityUseCaseSkeletonModelAssembler $deleteEntityUseCaseSkeletonModelAssembler
    ): void {
        $this->deleteEntityUseCaseSkeletonModelAssembler = $deleteEntityUseCaseSkeletonModelAssembler;
    }
}
