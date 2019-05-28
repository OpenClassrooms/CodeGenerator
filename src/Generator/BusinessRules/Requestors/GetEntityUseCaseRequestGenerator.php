<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\GetEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\GetEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseRequestSkeletonModelAssembler
     */
    private $getEntityUseCaseRequestSkeletonModelAssembler;

    /**
     * @param GetEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseRequestFileObject = $this->buildGetEntityUseCaseRequestFileObject($generatorRequest->getEntity());

        $this->insertFileObject($getEntityUseCaseRequestFileObject);

        return $getEntityUseCaseRequestFileObject;
    }

    private function buildGetEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject($entityFileObject);

        $getEntityUseCaseRequestFileObject->setContent(
            $this->generateContent($getEntityUseCaseRequestFileObject, $entityFileObject)
        );

        return $getEntityUseCaseRequestFileObject;
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

    private function createGetEntityUseCaseRequestFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(FileObject $getEntityUseCaseRequestFileObject, FileObject $entityFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($getEntityUseCaseRequestFileObject, $entityFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $getEntityUseCaseRequestFileObject,
        FileObject $entityFileObject
    ): GetEntityUseCaseRequestSkeletonModel
    {
        return $this->getEntityUseCaseRequestSkeletonModelAssembler->create($getEntityUseCaseRequestFileObject, $entityFileObject);
    }

    public function setGetEntityUseCaseRequestSkeletonModelAssembler(
        GetEntityUseCaseRequestSkeletonModelAssembler $getEntityUseCaseRequestSkeletonModelAssembler
    ): void
    {
        $this->getEntityUseCaseRequestSkeletonModelAssembler = $getEntityUseCaseRequestSkeletonModelAssembler;
    }
}
