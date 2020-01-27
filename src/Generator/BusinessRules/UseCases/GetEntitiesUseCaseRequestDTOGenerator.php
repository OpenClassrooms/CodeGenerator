<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GetEntitiesUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOSkeletonModelAssembler;

class GetEntitiesUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GetEntitiesUseCaseRequestDTOSkeletonModelAssembler
     */
    private $getEntitiesUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @param GetEntitiesUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $getEntitiesUseCaseRequestDTOFileObject = $this->buildGetEntitiesUseCaseRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($getEntitiesUseCaseRequestDTOFileObject);

        return $getEntitiesUseCaseRequestDTOFileObject;
    }

    private function buildGetEntitiesUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $getEntitiesUseCaseRequestFileObject = $this->createGetEntitiesUseCaseRequestFileObject();
        $getEntitiesUseCaseRequestDTOFileObject = $this->createGetEntitiesUseCaseRequestDTOFileObject();

        $getEntitiesUseCaseRequestDTOFileObject->setContent(
            $this->generateContent(
                $getEntitiesUseCaseRequestFileObject,
                $getEntitiesUseCaseRequestDTOFileObject
            )
        );

        return $getEntitiesUseCaseRequestDTOFileObject;
    }

    private function createGetEntitiesUseCaseRequestFileObject(): FileObject
    {
        return $this->createUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST
        );
    }

    private function createUseCaseRequestFileObject(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createGetEntitiesUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createUseCaseRequestFileObject(
            UseCaseRequestFileObjectType::BUSINESS_RULES_GET_ENTITIES_USE_CASE_REQUEST_DTO
        );
    }

    private function generateContent(
        FileObject $getEntitiesUseCaseRequestFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $getEntitiesUseCaseRequestFileObject,
            $getEntitiesUseCaseRequestDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $getEntitiesUseCaseRequestFileObject,
        FileObject $getEntitiesUseCaseRequestDTOFileObject
    ): GetEntitiesUseCaseRequestDTOSkeletonModel {
        return $this->getEntitiesUseCaseRequestDTOSkeletonModelAssembler->create(
            $getEntitiesUseCaseRequestFileObject,
            $getEntitiesUseCaseRequestDTOFileObject
        );
    }

    public function setGetEntitiesUseCaseRequestDTOSkeletonModelAssembler(
        GetEntitiesUseCaseRequestDTOSkeletonModelAssembler $getEntitiesUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->getEntitiesUseCaseRequestDTOSkeletonModelAssembler = $getEntitiesUseCaseRequestDTOSkeletonModelAssembler;
    }
}
