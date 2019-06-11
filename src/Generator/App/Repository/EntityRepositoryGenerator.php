<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Repository;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
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
        $entityGatewayFileObject = $this->createEntityGatewayFileObject();
        $entityRepositoryFileObject = $this->createEntityRepositoryFileObject();

        $entityRepositoryFileObject->setContent(
            $this->generateContent(
                $entityGatewayFileObject,
                $entityRepositoryFileObject
            )
        );

        return $entityRepositoryFileObject;
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
        FileObject $entityGatewayFileObject,
        FileObject $entityRepositoryFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($entityGatewayFileObject, $entityRepositoryFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityGatewayFileObject,
        FileObject $entityRepositoryFileObject
    ): EntityRepositorySkeletonModel {
        return $this->entityRepositorySkeletonModelAssembler->create(
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
