<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class CreateEntityUseCaseRequestGenerator extends AbstractUseCaseGenerator
{
    private CreateEntityUseCaseRequestSkeletonModelAssembler $createEntityUseCaseRequestSkeletonModelAssembler;

    /**
     * @param CreateEntityUseCaseRequestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityUseCaseRequestFileObject = $this->buildCreateEntityUseCaseRequestFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityUseCaseRequestFileObject);

        return $createEntityUseCaseRequestFileObject;
    }

    private function buildCreateEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityUseCaseRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject($entityClassName);
        $entityUseCaseCommonRequestFileObject = $this->createEntityUseCaseCommonRequestTraitFileObject();
        $createRequestTraitFileObject = $this->createCreateRequestTraitFileObject();

        $createEntityUseCaseRequestFileObject->setContent(
            $this->generateContent(
                $createEntityUseCaseRequestFileObject,
                $createRequestTraitFileObject,
                $entityUseCaseCommonRequestFileObject
            )
        );

        return $createEntityUseCaseRequestFileObject;
    }

    private function createCreateEntityUseCaseRequestFileObject(string $entityClassName): FileObject
    {
        $fileObject = $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST
        );

        $fileObject->setFields($this->getProtectedClassFields($entityClassName));
        $fileObject->setMethods(MethodUtility::buildWitherMethods($entityClassName, $fileObject->getShortName()));

        return $fileObject;
    }

    private function createCreateEntityUseCaseRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityUseCaseCommonRequestTraitFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_ENTITY_USE_CASE_COMMON_REQUEST
        );
    }

    private function createCreateRequestTraitFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_REQUEST_TRAIT
        );
    }

    private function generateContent(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createRequestTraitFileObject,
        FileObject $entityUseCaseCommonRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $createEntityUseCaseRequestFileObject,
            $createRequestTraitFileObject,
            $entityUseCaseCommonRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createRequestTraitFileObject,
        FileObject $entityUseCaseCommonRequestFileObject
    ): CreateEntityUseCaseRequestSkeletonModel {
        return $this->createEntityUseCaseRequestSkeletonModelAssembler->create(
            $createEntityUseCaseRequestFileObject,
            $createRequestTraitFileObject,
            $entityUseCaseCommonRequestFileObject
        );
    }

    public function setCreateEntityUseCaseRequestSkeletonModelAssembler(
        CreateEntityUseCaseRequestSkeletonModelAssembler $createEntityUseCaseRequestSkeletonModelAssembler
    ): void {
        $this->createEntityUseCaseRequestSkeletonModelAssembler = $createEntityUseCaseRequestSkeletonModelAssembler;
    }

    /**
     * @return array|\OpenClassrooms\CodeGenerator\Entities\Object\FieldObject[]
     */
    protected function getProtectedClassFields(string $entityClassName): array
    {
        $unwantedFields = ['id', 'updatedAt', 'createdAt'];
        $fieldObjects = parent::getProtectedClassFields($entityClassName);
        foreach ($fieldObjects as $key => $fieldObject) {
            if (in_array($fieldObject->getName(), $unwantedFields)) {
                unset($fieldObjects[$key]);
            }
        }

        return $fieldObjects;
    }
}
