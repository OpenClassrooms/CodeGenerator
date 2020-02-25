<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EntityCommonHydratorTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityCommonHydratorTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EntityCommonHydratorTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class EntityCommonHydratorTraitGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EntityCommonHydratorTraitSkeletonModelAssembler
     */
    private $entityCommonHydratorTraitSkeletonModelAssembler;

    /**
     * @param EntityCommonHydratorTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityCommonHydratorTraitFileObject = $this->buildEntityCommonHydratorTraitFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityCommonHydratorTraitFileObject);

        return $entityCommonHydratorTraitFileObject;
    }

    private function buildEntityCommonHydratorTraitFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityCommonHydratorTraitFileObject = $this->createEntityCommonHydratorTraitFileObject();
        $entityFileObject = $this->createEntityFileObject();
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();

        $editEntityUseCaseRequestFileObject->setMethods(MethodUtility::getAccessorsUpdatable($entityClassName));

        $entityCommonHydratorTraitFileObject->setContent(
            $this->generateContent(
                $entityCommonHydratorTraitFileObject,
                $entityFileObject,
                $editEntityUseCaseRequestFileObject
            )
        );

        return $entityCommonHydratorTraitFileObject;
    }

    private function createEntityCommonHydratorTraitFileObject(): FileObject
    {
        return $this->useCaseFileObjectFactory->create(
            UseCaseFileObjectType::BUSINESS_RULES_ENTITY_COMMON_HYDRATOR_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    public function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    public function createEditEntityUseCaseRequestFileObject(): FileObject
    {

        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityCommonHydratorTraitFileObject,
        FileObject $entityFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityCommonHydratorTraitFileObject,
            $entityFileObject,
            $editEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityCommonHydratorTraitFileObject,
        FileObject $entityFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EntityCommonHydratorTraitSkeletonModel {
        return $this->entityCommonHydratorTraitSkeletonModelAssembler->create(
            $entityCommonHydratorTraitFileObject,
            $entityFileObject,
            $editEntityUseCaseRequestFileObject
        );
    }

    public function setEntityCommonHydratorTraitSkeletonModelAssembler(
        EntityCommonHydratorTraitSkeletonModelAssembler $entityCommonHydratorTraitSkeletonModelAssembler
    ): void {
        $this->entityCommonHydratorTraitSkeletonModelAssembler = $entityCommonHydratorTraitSkeletonModelAssembler;
    }
}
