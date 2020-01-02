<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\EntityModelTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\EntityModelTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\EntityModelTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ModelFieldUtility;

class EntityModelTraitGenerator extends AbstractGenerator
{
    /**
     * @var ModelFileObjectFactory
     */
    private $modelFileObjectFactory;

    /**
     * @var EntityModelTraitSkeletonModelAssembler
     */
    private $entityModelTraitSkeletonModelAssembler;

    /**
     * @param EntityModelTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $entityModelTraitFileObject = $this->buildEntityModelTraitFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($entityModelTraitFileObject);

        return $entityModelTraitFileObject;
    }

    private function buildEntityModelTraitFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityModelTraitFileObject = $this->createEntityModelTraitFileObject();
        $entityModelTraitFileObject->setFields(ModelFieldUtility::generateModelFieldObjects($entityClassName));

        $entityModelTraitFileObject->setContent(
            $this->generateContent($entityModelTraitFileObject)
        );

        return $entityModelTraitFileObject;
    }

    private function createEntityModelTraitFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_ENTITY_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(FileObject $entityModelTraitFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($entityModelTraitFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $entityModelTraitFileObject): EntityModelTraitSkeletonModel
    {
        return $this->entityModelTraitSkeletonModelAssembler->create($entityModelTraitFileObject);
    }

    public function setEntityModelTraitSkeletonModelAssembler(
        EntityModelTraitSkeletonModelAssembler $entityModelTraitSkeletonModelAssembler
    ): void {
        $this->entityModelTraitSkeletonModelAssembler = $entityModelTraitSkeletonModelAssembler;
    }

    public function setModelFileObjectFactory(ModelFileObjectFactory $modelFileObjectFactory): void
    {
        $this->modelFileObjectFactory = $modelFileObjectFactory;
    }
}
