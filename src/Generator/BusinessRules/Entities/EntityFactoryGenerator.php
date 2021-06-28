<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\Request\EntityFactoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities\EntityFactorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Entities\EntityFactorySkeletonModelAssembler;

class EntityFactoryGenerator extends AbstractGenerator
{
    private EntityFactorySkeletonModelAssembler $entityFactorySkeletonModelAssembler;

    private EntityFileObjectFactory $entityFileObjectFactory;

    /**
     * @param EntityFactoryGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityFactoryFileObject = $this->buildEntityFactoryFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityFactoryFileObject);

        return $entityFactoryFileObject;
    }

    private function buildEntityFactoryFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFactoryFileObject = $this->createEntityFactoryFileObject();
        $entityFileObject = $this->createEntityFileObject();

        $entityFactoryFileObject->setContent(
            $this->generateContent($entityFactoryFileObject, $entityFileObject)
        );

        return $entityFactoryFileObject;
    }

    private function createEntityFactoryFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY);
    }

    private function createFileObject(string $type): FileObject
    {
        return $this->entityFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY);
    }

    private function generateContent(FileObject $entityFactoryFileObject, FileObject $entityFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityFactoryFileObject, $entityFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFactoryFileObject,
        FileObject $entityFileObject
    ): EntityFactorySkeletonModel {
        return $this->entityFactorySkeletonModelAssembler->create($entityFactoryFileObject, $entityFileObject);
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setEntityFactorySkeletonModelAssembler(
        EntityFactorySkeletonModelAssembler $entityFactorySkeletonModelAssembler
    ): void {
        $this->entityFactorySkeletonModelAssembler = $entityFactorySkeletonModelAssembler;
    }
}
