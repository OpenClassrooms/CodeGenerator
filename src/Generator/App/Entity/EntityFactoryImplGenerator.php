<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityFactoryImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityFactoryImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityFactoryImplSkeletonModelAssembler;

class EntityFactoryImplGenerator extends AbstractGenerator
{
    private EntityFactoryImplSkeletonModelAssembler $entityFactoryImplSkeletonModelAssembler;

    private EntityFileObjectFactory $entityFileObjectFactory;

    /**
     * @param EntityFactoryImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityFactoryImplFileObject = $this->buildEntityFactoryImplFileObject($generatorRequest->getEntityClassName());

        $this->insertFileObject($entityFactoryImplFileObject);

        return $entityFactoryImplFileObject;
    }

    private function buildEntityFactoryImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFactoryFileObject = $this->createEntityFactoryFileObject();
        $entityFactoryImplFileObject = $this->createEntityFactoryImplFileObject();
        $entityFileObject = $this->createEntityFileObject();
        $entityImplFileObject = $this->createEntityImplFileObject();

        $entityFactoryImplFileObject->setContent(
            $this->generateContent(
                $entityFactoryFileObject,
                $entityFactoryImplFileObject,
                $entityFileObject,
                $entityImplFileObject
            )
        );

        return $entityFactoryImplFileObject;
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

    private function createEntityFactoryImplFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_FACTORY_IMPL);
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY);
    }

    private function createEntityImplFileObject(): FileObject
    {
        return $this->createFileObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL);
    }

    private function generateContent(
        FileObject $entityFactoryFileObject,
        FileObject $entityFactoryImplFileObject,
        FileObject $entityFileObject,
        FileObject $entityImplFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFactoryFileObject,
            $entityFactoryImplFileObject,
            $entityFileObject,
            $entityImplFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFactoryFileObject,
        FileObject $entityFactoryImplFileObject,
        FileObject $entityFileObject,
        FileObject $entityImplFileObject
    ): EntityFactoryImplSkeletonModel {
        return $this->entityFactoryImplSkeletonModelAssembler->create(
            $entityFactoryFileObject,
            $entityFactoryImplFileObject,
            $entityFileObject,
            $entityImplFileObject
        );
    }

    public function setEntityFactoryImplSkeletonModelAssembler(
        EntityFactoryImplSkeletonModelAssembler $entityFactoryImplSkeletonModelAssembler
    ): void {
        $this->entityFactoryImplSkeletonModelAssembler = $entityFactoryImplSkeletonModelAssembler;
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }
}
