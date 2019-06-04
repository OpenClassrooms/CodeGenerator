<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityGatewayGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityGatewaySkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $entityGatewayFileObject = $this->createEntityGatewayFileObject($entityFileObject);
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject($entityFileObject);

        $entityGatewayFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $entityGatewayFileObject,
                $entityNotFoundExceptionFileObject
            )
        );

        return $entityGatewayFileObject;
    }

    private function createEntityFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createEntityGatewayFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createEntityNotFoundExceptionFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject
    ): string
    {
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
    ): EntityGatewaySkeletonModel
    {
        return $this->entityGatewaySkeletonModelAssembler->create(
            $entityFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject
        );
    }

    public function setEntityGatewaySkeletonModelAssembler(
        EntityGatewaySkeletonModelAssembler $entityGatewaySkeletonModelAssembler
    ): void
    {
        $this->entityGatewaySkeletonModelAssembler = $entityGatewaySkeletonModelAssembler;
    }
}
