<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\App\Entity;

use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectFactory;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\Request\EntityImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\App\Entity\EntityImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
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
        $entityImplFileObject = $this->createEntityImplFileObject($useCaseResponseClassName);
        $entityFileObject = $this->createEntityFileObject($entityImplFileObject);

        $entityImplFileObject->setContent($this->generateContent($entityImplFileObject, $entityFileObject));

        return $entityImplFileObject;
    }

    private function createEntityImplFileObject(string $useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_IMPL,
            $domain,
            $entity
        );
    }

    private function createEntityFileObject(FileObject $entityImplFileObject): FileObject
    {

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $entityImplFileObject->getDomain(),
            $entityImplFileObject->getEntity()
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
    ): EntityImplSkeletonModel
    {
        return $this->entityImplSkeletonModelAssembler->create($entityImplFileObject, $entityFileObject);
    }

    public function setEntityFileObjectFactory(EntityFileObjectFactory $entityFileObjectFactory): void
    {
        $this->entityFileObjectFactory = $entityFileObjectFactory;
    }

    public function setEntityImplSkeletonModelAssembler(
        EntityImplSkeletonModelAssembler $entityImplSkeletonModelAssembler
    ): void
    {
        $this->entityImplSkeletonModelAssembler = $entityImplSkeletonModelAssembler;
    }
}
