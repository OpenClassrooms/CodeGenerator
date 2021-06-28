<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\CreateEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    private CreateEntityUseCaseRequestBuilderSkeletonModelAssembler $createEntityUseCaseRequestBuilderSkeletonModelAssembler;

    /**
     * @param CreateEntityUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityUseCaseRequestBuilderFileObject = $this->buildCreateEntityUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityUseCaseRequestBuilderFileObject);

        return $createEntityUseCaseRequestBuilderFileObject;
    }

    private function buildCreateEntityUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityUseCaseRequestBuilderFileObject = $this->createCreateEntityUseCaseRequestBuilderFileObject();
        $createEntityUseCaseRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();

        $createEntityUseCaseRequestBuilderFileObject->setMethods(
            MethodUtility::buildWitherMethods(
                $entityClassName,
                $createEntityUseCaseRequestBuilderFileObject->getShortName()
            )
        );

        $createEntityUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent(
                $createEntityUseCaseRequestBuilderFileObject,
                $createEntityUseCaseRequestFileObject
            )
        );

        return $createEntityUseCaseRequestBuilderFileObject;
    }

    private function createCreateEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $createEntityUseCaseRequestBuilderFileObject,
            $createEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityUseCaseRequestBuilderFileObject,
        FileObject $createEntityUseCaseRequestFileObject
    ): CreateEntityUseCaseRequestBuilderSkeletonModel {
        return $this->createEntityUseCaseRequestBuilderSkeletonModelAssembler->create(
            $createEntityUseCaseRequestBuilderFileObject,
            $createEntityUseCaseRequestFileObject
        );
    }

    public function setCreateEntityUseCaseRequestBuilderSkeletonModelAssembler(
        CreateEntityUseCaseRequestBuilderSkeletonModelAssembler $createEntityUseCaseRequestBuilderSkeletonModelAssembler
    ): void {
        $this->createEntityUseCaseRequestBuilderSkeletonModelAssembler = $createEntityUseCaseRequestBuilderSkeletonModelAssembler;
    }
}
