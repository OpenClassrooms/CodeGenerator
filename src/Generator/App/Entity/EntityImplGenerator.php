<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityImplSkeletonModelAssembler;

class EntityImplGenerator extends AbstractGenerator
{
    /**
     * @var EntityFileObjectFactory
     */
    private $entityFileObjectFactory;

    /**
     * @var EntityImplSkeletonModelAssembler
     */
    private $entityImplSkeletonModelAssembler;

    /**
     * @param EntityImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityImplFileObject = $this->buildEntityImplFileObject($generatorRequest->getUseCaseResponseClassName());
        $this->insertFileObject($entityImplFileObject);

        return $entityImplFileObject;
    }

    private function buildEntityImplFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $entityImplFileObject = $this->createEntityImplFileObject();
        $entityFileObject = $this->createEntityFileObject();

        $entityImplFileObject->setContent($this->generateContent($entityImplFileObject, $entityFileObject));

        return $entityImplFileObject;
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

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(FileObject $entityImplFileObject, FileObject $entityFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityImplFileObject, $entityFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityImplFileObject,
        FileObject $entityFileObject
    ): EntityImplSkeletonModel {
        return $this->entityImplSkeletonModelAssembler->create($entityImplFileObject, $entityFileObject);
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setEntityImplSkeletonModelAssembler(
        EntityImplSkeletonModelAssembler $entityImplSkeletonModelAssembler
    ): void {
        $this->entityImplSkeletonModelAssembler = $entityImplSkeletonModelAssembler;
    }
}
