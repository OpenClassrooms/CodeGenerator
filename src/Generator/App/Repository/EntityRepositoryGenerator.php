<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\Request\EntityRepositoryGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Repository\EntityRepositorySkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class EntityRepositoryGenerator extends AbstractGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var EntityRepositorySkeletonModelAssembler
     */
    private $entityRepositorySkeletonModelAssembler;

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

        $entityRepositoryFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $entityImplFileObject,
                $entityGatewayFileObject,
                $entityRepositoryFileObject
            )
        );

        return $entityRepositoryFileObject;
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

    private function createEntityImplFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityGatewayFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_GATEWAY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityRepositoryFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_REPOSITORY,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $entityImplFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityRepositoryFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $entityImplFileObject,
            $entityGatewayFileObject,
            $entityRepositoryFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $entityImplFileObject,
        FileObject $entityGatewayFileObject,
        FileObject $entityRepositoryFileObject
    ): EntityRepositorySkeletonModel {
        return $this->entityRepositorySkeletonModelAssembler->create(
            $entityFileObject,
            $entityImplFileObject,
            $entityGatewayFileObject,
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
