<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModelAssembler;

class EntityNotFoundExceptionGenerator extends AbstractUseCaseGenerator
{
    private EntityNotFoundExceptionSkeletonModelAssembler $entityNotFoundExceptionSkeletonModelAssembler;

    /**
     * @param EntityNotFoundExceptionGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityNotFoundExceptionFileObject = $this->buildEntityNotFoundExceptionFileObject(
            $generatorRequest->getEnity()
        );

        $this->insertFileObject($entityNotFoundExceptionFileObject);

        return $entityNotFoundExceptionFileObject;
    }

    private function buildEntityNotFoundExceptionFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();

        $entityNotFoundExceptionFileObject->setContent(
            $this->generateContent($entityNotFoundExceptionFileObject)
        );

        return $entityNotFoundExceptionFileObject;
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $entityNotFoundExceptionFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($entityNotFoundExceptionFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        $entityNotFoundExceptionFileObject
    ): EntityNotFoundExceptionSkeletonModel {
        return $this->entityNotFoundExceptionSkeletonModelAssembler->create($entityNotFoundExceptionFileObject);
    }

    public function setEntityNotFoundExceptionSkeletonModelAssembler(
        EntityNotFoundExceptionSkeletonModelAssembler $entityNotFoundExceptionSkeletonModelAssembler
    ): void {
        $this->entityNotFoundExceptionSkeletonModelAssembler = $entityNotFoundExceptionSkeletonModelAssembler;
    }
}
