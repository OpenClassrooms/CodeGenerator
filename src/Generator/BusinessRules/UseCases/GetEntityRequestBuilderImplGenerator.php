<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GetEntityRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntityRequestBuilderImplSkeletonModelAssembler
     */
    private $getEntityRequestBuilderImplSkeletonModelAssembler;

    /**
     * @param GetEntityRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntityRequestBuilderImplFileObject = $this->buildGetEntityRequestBuilderImplFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($getEntityRequestBuilderImplFileObject);

        return $getEntityRequestBuilderImplFileObject;
    }

    private function buildGetEntityRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $getEntityRequestBuilderFileObject = $this->createGetEntityRequestBuilderFileObject($entityFileObject);
        $getEntityRequestBuilderImplFileObject = $this->createGetEntityRequestBuilderImplFileObject($entityFileObject);
        $getEntityRequestDTOFileObject = $this->createGetEntityRequestDTOFileObject($entityFileObject);
        $getEntityRequestFileObject = $this->createGetEntityRequestFileObject($entityFileObject);

        $getEntityRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $getEntityRequestBuilderFileObject,
                $getEntityRequestBuilderImplFileObject,
                $getEntityRequestDTOFileObject,
                $getEntityRequestFileObject
            )
        );

        return $getEntityRequestBuilderImplFileObject;
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

    private function createGetEntityRequestBuilderFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function createGetEntityRequestBuilderImplFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_BUILDER_IMPL,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function createGetEntityRequestDTOFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST_DTO,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function createGetEntityRequestFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_USE_CASE_REQUEST,
            $fileObject->getDomain(),
            $fileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestBuilderImplFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $getEntityRequestBuilderFileObject,
            $getEntityRequestBuilderImplFileObject,
            $getEntityRequestDTOFileObject,
            $getEntityRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $getEntityRequestBuilderFileObject,
        FileObject $getEntityRequestBuilderImplFileObject,
        FileObject $getEntityRequestDTOFileObject,
        FileObject $getEntityRequestFileObject
    ): GetEntityRequestBuilderImplSkeletonModel
    {
        return $this->getEntityRequestBuilderImplSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityRequestBuilderFileObject,
            $getEntityRequestBuilderImplFileObject,
            $getEntityRequestDTOFileObject,
            $getEntityRequestFileObject
        );
    }

    public function setGetEntityRequestBuilderImplSkeletonModelAssembler(
        GetEntityRequestBuilderImplSkeletonModelAssembler $getEntityRequestBuilderImplSkeletonModelAssembler
    ): void
    {
        $this->getEntityRequestBuilderImplSkeletonModelAssembler = $getEntityRequestBuilderImplSkeletonModelAssembler;
    }
}
