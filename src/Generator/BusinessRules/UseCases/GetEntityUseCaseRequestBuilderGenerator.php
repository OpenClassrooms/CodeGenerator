<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseRequestBuilderSkeletonModelAssembler
     */
    private $getEntityUseCaseRequestBuilderSkeletonModelAssembler;

    /**
     * @param GetEntityUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseRequestBuilderFileObject = $this->buildGetEntityUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($getEntityUseCaseRequestBuilderFileObject);

        return $getEntityUseCaseRequestBuilderFileObject;
    }

    private function buildGetEntityUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $getEntityUseCaseRequestBuilderFileObject = $this->createGetEntityUseCaseRequestBuilderFileObject($entityFileObject);
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject($entityFileObject);

        $getEntityUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent($entityFileObject, $getEntityUseCaseRequestBuilderFileObject, $getEntityUseCaseRequestFileObject)
        );

        return $getEntityUseCaseRequestBuilderFileObject;
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

    private function createGetEntityUseCaseRequestBuilderFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityUseCaseRequestBuilderFileObject,
            $getEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderSkeletonModel
    {
        return $this->getEntityUseCaseRequestBuilderSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityUseCaseRequestBuilderFileObject,
            $getEntityUseCaseRequestFileObject
        );
    }

    public function setGetEntityUseCaseRequestBuilderSkeletonModelAssembler(
        GetEntityUseCaseRequestBuilderSkeletonModelAssembler $getEntityUseCaseRequestBuilderSkeletonModelAssembler
    ): void
    {
        $this->getEntityUseCaseRequestBuilderSkeletonModelAssembler = $getEntityUseCaseRequestBuilderSkeletonModelAssembler;
    }
}
