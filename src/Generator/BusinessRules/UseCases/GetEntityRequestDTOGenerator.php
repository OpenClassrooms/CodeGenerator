<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityRequestDTOSkeletonModelAssembler
     */
    private $getEntityRequestDTOSkeletonModelAssembler;

    /**
     * @param GetEntityRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityRequestDTOFileObject = $this->buildGetEntityRequestDTOFileObject($generatorRequest->getEntity());

        $this->insertFileObject($getEntityRequestDTOFileObject);

        return $getEntityRequestDTOFileObject;
    }

    private function buildGetEntityRequestDTOFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);

        $getEntityRequestFileObject = $this->createGetEntityRequesFileObject($entityFileObject);
        $getEntityRequestDTOFileObject = $this->createGetEntityRequestDTOFileObject($entityFileObject);

        $getEntityRequestDTOFileObject->setContent(
            $this->generateContent($entityFileObject, $getEntityRequestDTOFileObject, $getEntityRequestFileObject)
        );

        return $getEntityRequestDTOFileObject;
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

    private function createGetEntityRequesFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGetEntityRequestDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityRequestDTOFileObject,
            $getEntityRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestDTOSkeletonModel
    {
        return $this->getEntityRequestDTOSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityRequestDTOFileObject,
            $getEntityRequestFileObject
        );
    }

    public function setGetEntityRequestDTOSkeletonModelAssembler(
        GetEntityRequestDTOSkeletonModelAssembler $getEntityRequestDTOSkeletonModelAssembler
    ): void
    {
        $this->getEntityRequestDTOSkeletonModelAssembler = $getEntityRequestDTOSkeletonModelAssembler;
    }
}
