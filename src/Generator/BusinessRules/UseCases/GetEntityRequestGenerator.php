<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityRequestSkeletonModelAssembler
     */
    private $getEntityRequestSkeletonModelAssembler;

    /**
     * @param GetEntityRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityRequestFileObject = $this->buildGetEntityRequestFileObject($generatorRequest->getEntity());

        $this->insertFileObject($getEntityRequestFileObject);

        return $getEntityRequestFileObject;
    }

    private function buildGetEntityRequestFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $getEntityRequestFileObject = $this->createGetEntityRequestFileObject($entityFileObject);

        $getEntityRequestFileObject->setContent(
            $this->generateContent($getEntityRequestFileObject, $entityFileObject)
        );

        return $getEntityRequestFileObject;
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

    private function createGetEntityRequestFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function generateContent(FileObject $getEntityRequestFileObject, FileObject $entityFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($getEntityRequestFileObject, $entityFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $getEntityRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityRequestSkeletonModel
    {
        return $this->getEntityRequestSkeletonModelAssembler->create($getEntityRequestFileObject, $entityFileObject);
    }

    public function setGetEntityRequestSkeletonModelAssembler(
        GetEntityRequestSkeletonModelAssembler $getEntityRequestSkeletonModelAssembler
    ): void
    {
        $this->getEntityRequestSkeletonModelAssembler = $getEntityRequestSkeletonModelAssembler;
    }
}
