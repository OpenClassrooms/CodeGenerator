<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\DeleteEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOSkeletonModelAssembler;

class DeleteEntityUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var DeleteEntityUseCaseRequestDTOSkeletonModelAssembler
     */
    private $deleteEntityUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @param DeleteEntityUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $deleteEntityUseCaseRequestDTOFileObject = $this->buildDeleteEntityUseCaseRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($deleteEntityUseCaseRequestDTOFileObject);

        return $deleteEntityUseCaseRequestDTOFileObject;
    }

    private function buildDeleteEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $deleteEntityUseCaseRequestDTOFileObject = $this->createDeleteEntityUseCaseRequestDTOFileObject();
        $deleteEntityUseCaseRequestFileObject = $this->createDeleteEntityUseCaseRequestFileObject();

        $deleteEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent(
                $deleteEntityUseCaseRequestDTOFileObject,
                $deleteEntityUseCaseRequestFileObject
            )
        );

        return $deleteEntityUseCaseRequestDTOFileObject;
    }

    private function createDeleteEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createDeleteEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_DELETE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $deleteEntityUseCaseRequestDTOFileObject,
            $deleteEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $deleteEntityUseCaseRequestDTOFileObject,
        FileObject $deleteEntityUseCaseRequestFileObject
    ): DeleteEntityUseCaseRequestDTOSkeletonModel {
        return $this->deleteEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $deleteEntityUseCaseRequestDTOFileObject,
            $deleteEntityUseCaseRequestFileObject
        );
    }

    public function setDeleteEntityUseCaseRequestDTOSkeletonModelAssembler(
        DeleteEntityUseCaseRequestDTOSkeletonModelAssembler $deleteEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->deleteEntityUseCaseRequestDTOSkeletonModelAssembler = $deleteEntityUseCaseRequestDTOSkeletonModelAssembler;
    }
}
