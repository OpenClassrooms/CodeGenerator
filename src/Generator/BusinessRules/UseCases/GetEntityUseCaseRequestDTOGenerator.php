<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntityUseCaseRequestDTOSkeletonModelAssembler;

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
        $getEntityUseCaseRequestDTOFileObject = $this->buildGetEntityUseCaseRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntityUseCaseRequestDTOFileObject);

        return $getEntityUseCaseRequestDTOFileObject;
    }

    private function buildGetEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();

        $getEntityUseCaseRequestFileObject = $this->createGetEntityUseCaseRequesFileObject();
        $getEntityUseCaseRequestDTOFileObject = $this->createGetEntityUseCaseRequestDTOFileObject();

        $getEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $getEntityUseCaseRequestDTOFileObject,
                $getEntityUseCaseRequestFileObject
            )
        );

        return $getEntityUseCaseRequestDTOFileObject;
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

    private function createGetEntityUseCaseRequesFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITY_USE_CASE_REQUEST,
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

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $getEntityUseCaseRequestDTOFileObject,
        FileObject $getEntityUseCaseRequestFileObject
    ): string {
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
    ): GetEntityUseCaseRequestDTOSkeletonModel {
        return $this->getEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $entityFileObject,
            $getEntityUseCaseRequestDTOFileObject,
            $getEntityUseCaseRequestFileObject
        );
    }

    public function setGetEntityUseCaseRequestDTOSkeletonModelAssembler(
        GetEntityUseCaseRequestDTOSkeletonModelAssembler $getEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->getEntityUseCaseRequestDTOSkeletonModelAssembler = $getEntityUseCaseRequestDTOSkeletonModelAssembler;
    }
}
