<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModelAssembler;

class EntityGatewayGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EntityGatewaySkeletonModelAssembler
     */
    private $entityGatewaySkeletonModelAssembler;

    /**
     * @param EntityGatewayGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityGatewayFileObject = $this->buildEntityGatewayFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityGatewayFileObject);

        return $entityGatewayFileObject;
    }

    private function buildEntityGatewayFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();

        $entityGatewayFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $entityGatewayFileObject,
                $entityNotFoundExceptionFileObject
            )
        );

        return $entityGatewayFileObject;
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

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): EntityGatewaySkeletonModel {
        return $this->entityGatewaySkeletonModelAssembler->create(
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject
        );
    }

    public function setEntityGatewaySkeletonModelAssembler(
        EntityGatewaySkeletonModelAssembler $entityGatewaySkeletonModelAssembler
    ): void {
        $this->entityGatewaySkeletonModelAssembler = $entityGatewaySkeletonModelAssembler;
    }
}
