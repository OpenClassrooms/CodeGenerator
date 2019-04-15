<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityRequestBuilderSkeletonModelAssembler
     */
    private $getEntityRequestBuilderSkeletonModelAssembler;

    /**
     * @param GetEntityRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityRequestBuilderFileObject = $this->buildGetEntityRequestBuilderFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($getEntityRequestBuilderFileObject);

        return $getEntityRequestBuilderFileObject;
    }

    private function buildGetEntityRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $getEntityRequestBuilderFileObject = $this->createGetEntityRequestBuilderFileObject($entityFileObject);
        $getEntityRequestFileObject = $this->createGetEntityRequestFileObject($entityFileObject);

        $getEntityRequestBuilderFileObject->setContent(
            $this->generateContent($entityFileObject, $getEntityRequestBuilderFileObject, $getEntityRequestFileObject)
        );

        return $getEntityRequestBuilderFileObject;
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

    private function createGetEntityRequestBuilderFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntityRequestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityRequestBuilderFileObject,
            $getEntityRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestBuilderSkeletonModel
    {
        return $this->getEntityRequestBuilderSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityRequestBuilderFileObject,
            $getEntityRequestFileObject
        );
    }

    public function setGetEntityRequestBuilderSkeletonModelAssembler(
        GetEntityRequestBuilderSkeletonModelAssembler $getEntityRequestBuilderSkeletonModelAssembler
    ): void
    {
        $this->getEntityRequestBuilderSkeletonModelAssembler = $getEntityRequestBuilderSkeletonModelAssembler;
    }
}
