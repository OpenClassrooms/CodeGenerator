<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\Request\EntityNotFoundExceptionGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Gateways\EntityNotFoundExceptionSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityNotFoundExceptionGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EntityNotFoundExceptionSkeletonModelAssembler
     */
    private $entityNotFoundExceptionSkeletonModelAssembler;

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
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject($entityClassName);

        $entityNotFoundExceptionFileObject->setContent(
            $this->generateContent($entityNotFoundExceptionFileObject)
        );

        return $entityNotFoundExceptionFileObject;
    }

    private function createEntityNotFoundExceptionFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function generateContent(FileObject $entityNotFoundExceptionFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityNotFoundExceptionFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel($entityNotFoundExceptionFileObject): EntityNotFoundExceptionSkeletonModel
    {
        return $this->entityNotFoundExceptionSkeletonModelAssembler->create($entityNotFoundExceptionFileObject);
    }

    public function setEntityNotFoundExceptionSkeletonModelAssembler(
        EntityNotFoundExceptionSkeletonModelAssembler $entityNotFoundExceptionSkeletonModelAssembler
    ): void
    {
        $this->entityNotFoundExceptionSkeletonModelAssembler = $entityNotFoundExceptionSkeletonModelAssembler;
    }
}
