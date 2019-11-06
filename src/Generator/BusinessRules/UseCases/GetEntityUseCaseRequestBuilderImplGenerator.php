<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

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
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $getEntityUseCaseRequestBuilderFileObject = $this->createGetEntityUseCaseRequestBuilderFileObject();
        $getEntityUseCaseRequestBuilderImplFileObject = $this->createGetEntityUseCaseRequestBuilderImplFileObject();
        $getEntityUseCaseRequestDTOFileObject = $this->createGetEntityUseCaseRequestDTOFileObject();
        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequestFileObject();

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

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createGetEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestBuilderFileObject,
        FileObject $getEntityUseCaseRequestBuilderImplFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): string {
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
    ): GetEntityUseCaseRequestBuilderImplSkeletonModel {
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
    ): void {
        $this->getEntityUseCaseRequestBuilderImplSkeletonModelAssembler = $getEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
