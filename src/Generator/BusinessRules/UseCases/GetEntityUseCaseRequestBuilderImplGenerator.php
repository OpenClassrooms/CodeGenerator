<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityUseCaseRequestBuilderImplSkeletonModelAssembler
     */
    private $getEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param GetEntityUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityUseCaseRequestBuilderImplFileObject = $this->buildGetEntityUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityUseCaseRequestBuilderImplFileObject);

        return $getEntityUseCaseRequestBuilderImplFileObject;
    }

    private function buildGetEntityUseCaseRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $getEntityUseCaseRequestBuilderFileObject = $this->createGetEntityUseCaseRequestBuilderFileObject($entityFileObject);
        $getEntityUseCaseRequestBuilderImplFileObject = $this->createGetEntityUseCaseRequestBuilderImplFileObject($entityFileObject);
        $getEntityUseCaseRequestDTOFileObject = $this->createGetEntityUseCaseRequestDTOFileObject($entityFileObject);
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject($entityFileObject);

        $getEntityUseCaseRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $getEntityUseCaseRequestBuilderFileObject,
                $getEntityUseCaseRequestBuilderImplFileObject,
                $getEntityUseCaseRequestDTOFileObject,
                $getEntityUseCaseRequestFileObject
            )
        );

        return $getEntityUseCaseRequestBuilderImplFileObject;
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

    private function createGetEntityUseCaseRequestBuilderFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestBuilderImplFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestDTOFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function createGetEntityUseCaseRequestFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestBuilderImplFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityUseCaseRequestBuilderFileObject,
            $getEntityUseCaseRequestBuilderImplFileObject,
            $getEntityUseCaseRequestDTOFileObject,
            $getEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestBuilderImplFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): GetEntityUseCaseRequestBuilderImplSkeletonModel
    {
        return $this->getEntityUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityUseCaseRequestBuilderFileObject,
            $getEntityUseCaseRequestBuilderImplFileObject,
            $getEntityUseCaseRequestDTOFileObject,
            $getEntityUseCaseRequestFileObject
        );
    }

    public function setGetEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
        GetEntityUseCaseRequestBuilderImplSkeletonModelAssembler $getEntityUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void
    {
        $this->getEntityUseCaseRequestBuilderImplSkeletonModelAssembler = $getEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
