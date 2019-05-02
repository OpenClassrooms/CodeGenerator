<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseRequestDTOSkeletonModelAssembler
     */
    private $getEntityUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @param GetEntityUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseRequestDTOFileObject = $this->buildGetEntityUseCaseRequestDTOFileObject($generatorRequest->getEntity());

        $this->insertFileObject($getEntityUseCaseRequestDTOFileObject);

        return $getEntityUseCaseRequestDTOFileObject;
    }

    private function buildGetEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);

        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequesFileObject($entityFileObject);
        $getEntityUseCaseRequestDTOFileObject = $this->createGetEntityUseCaseRequestDTOFileObject($entityFileObject);

        $getEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent($entityFileObject, $getEntityUseCaseRequestDTOFileObject, $getEntityUseCaseRequestFileObject)
        );

        return $getEntityUseCaseRequestDTOFileObject;
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

    private function createGetEntityUseCaseRequesFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityUseCaseRequestDTOFileObject,
            $getEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestDTOSkeletonModel
    {
        return $this->getEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityUseCaseRequestDTOFileObject,
            $getEntityUseCaseRequestFileObject
        );
    }

    public function setGetEntityUseCaseRequestDTOSkeletonModelAssembler(
        GetEntityUseCaseRequestDTOSkeletonModelAssembler $getEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void
    {
        $this->getEntityUseCaseRequestDTOSkeletonModelAssembler = $getEntityUseCaseRequestDTOSkeletonModelAssembler;
    }
}
