<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class EditEntityUseCaseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EditEntityUseCaseSkeletonModelBuilder
     */
    private $editEntityUseCaseSkeletonModelBuilder;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtilityStrategy;

    /**
     * @param EditEntityUseCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $editEntityUseCaseFileObject = $this->buildEditEntityUseCaseFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($editEntityUseCaseFileObject);

        return $editEntityUseCaseFileObject;
    }

    private function buildEditEntityUseCaseFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseFileObject = $this->createEditEntityUseCaseFileObject();
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();
        $entityFileObject = $this->createEntityFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();
        $entityUseCaseDetailResponseAssemblerFileObject = $this->createEntityUseCaseDetailResponseAssemblerFileObject();
        $entityUseCaseDetailResponseFileObject = $this->createEntityUseCaseDetailResponseFileObject();

        $editEntityUseCaseRequestFileObject->setMethods($this->methodUtilityStrategy->getAccessors($entityClassName));

        $editEntityUseCaseFileObject->setContent(
            $this->generateContent(
                [
                    UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE                       => $editEntityUseCaseFileObject,
                    UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST        => $editEntityUseCaseRequestFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY                                      => $entityFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY                              => $entityGatewayFileObject,
                    EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION                  => $entityNotFoundExceptionFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER => $entityUseCaseDetailResponseAssemblerFileObject,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE           => $entityUseCaseDetailResponseFileObject,
                ]
            )
        );

        return $editEntityUseCaseFileObject;
    }

    private function createEditEntityUseCaseFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityNotFoundExceptionFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createEntityUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(array $fileObjects): EditEntityUseCaseSkeletonModel
    {
        return $this->editEntityUseCaseSkeletonModelBuilder
            ->create()
            ->withEditEntityUseCaseFileObject($fileObjects[UseCaseFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE])
            ->withEditEntityUseCaseRequestFileObject(
                $fileObjects[UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST]
            )
            ->withEntityFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY])
            ->withEntityGatewayFileObject($fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY])
            ->withEntityNotFoundExceptionFileObject(
                $fileObjects[EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION]
            )
            ->withEntityUseCaseDetailResponseAssemblerFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER]
            )
            ->withEntityUseCaseDetailResponseFileObject(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE]
            )
            ->build();
    }

    public function setEditEntityUseCaseSkeletonModelBuilder(
        EditEntityUseCaseSkeletonModelBuilder $editEntityUseCaseSkeletonModelBuilder
    ): void {
        $this->editEntityUseCaseSkeletonModelBuilder = $editEntityUseCaseSkeletonModelBuilder;
    }

    public function setMethodUtilityStrategy(MethodUtilityStrategy $methodUtilityStrategy): void
    {
        $this->methodUtilityStrategy = $methodUtilityStrategy;
    }
}
