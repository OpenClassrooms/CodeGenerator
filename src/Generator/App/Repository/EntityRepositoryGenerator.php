<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModelAssembler;

class EntityRepositoryGenerator extends AbstractGenerator
{
    private EntityFileObjectFactory $entityFileObjectFactory;

    private EntityRepositorySkeletonModelAssembler $entityRepositorySkeletonModelAssembler;

    /**
     * @param EntityRepositoryGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityRepositoryFileObject = $this->buildEntityRepositoryFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityRepositoryFileObject);

        return $entityRepositoryFileObject;
    }

    private function buildEntityRepositoryFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $entityImplFileObject = $this->createEntityImplFileObject();
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityRepositoryFileObject = $this->createEntityRepositoryFileObject();
        $entityNotFoundExceptionFileObject = $this->createEntityNotFoundExceptionFileObject();

        $entityRepositoryFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $entityImplFileObject,
                $entityGatewayFileObject,
                $entityNotFoundExceptionFileObject,
                $entityRepositoryFileObject
            )
        );

        return $entityRepositoryFileObject;
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->createEntityObject(EntityFileObjectType::BUSINESS_RULES_ENTITY);
    }

    private function createEntityObject(string $type): FileObject
    {
        return $this->entityFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityImplFileObject(): FileObject
    {
        return $this->createEntityObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL);
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->createEntityObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY);
    }

    private function createEntityRepositoryFileObject(): FileObject
    {
        return $this->createEntityObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_REPOSITORY);
    }

    private function createEntityNotFoundExceptionFileObject()
    {
        return $this->createEntityObject(EntityFileObjectType::BUSINESS_RULES_ENTITY_NOT_FOUND_EXCEPTION);
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityImplFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $entityRepositoryFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $entityImplFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject,
            $entityRepositoryFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $entityImplFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityNotFoundExceptionFileObject,
        FileObject $entityRepositoryFileObject
    ): EntityRepositorySkeletonModel {
        return $this->entityRepositorySkeletonModelAssembler->create(
            $entityFileObject,
            $entityImplFileObject,
            $entityGatewayFileObject,
            $entityNotFoundExceptionFileObject,
            $entityRepositoryFileObject
        );
    }

    public function setEntityFileObjectFactory(
        EntityFileObjectFactory $entityFileObjectFactory
    ): void {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setEntityRepositorySkeletonModelAssembler(
        EntityRepositorySkeletonModelAssembler $entityRepositorySkeletonModelAssembler
    ): void {
        $this->entityRepositorySkeletonModelAssembler = $entityRepositorySkeletonModelAssembler;
    }
}
