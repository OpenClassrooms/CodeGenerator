<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PutEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PutEntityModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PutEntityModelSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;

class PutEntityModelGenerator extends AbstractGenerator
{
    private PutEntityModelSkeletonModelAssembler $putEntityModelSkeletonModelAssembler;

    private ModelFileObjectFactory $modelFileObjectFactory;

    /**
     * @param PutEntityModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $putEntityModelFileObject = $this->buildPutEntityModelFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($putEntityModelFileObject);

        return $putEntityModelFileObject;
    }

    private function buildPutEntityModelFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityModelTraitFileObject = $this->createEntityModelTraitFileObject();
        $putEntityModelFileObject = $this->createPutEntityModelFileObject();

        $putEntityModelFileObject->setConsts(ConstUtility::generatePatchModelConsts($entityClassName));

        $putEntityModelFileObject->setContent(
            $this->generateContent($entityModelTraitFileObject, $putEntityModelFileObject)
        );

        return $putEntityModelFileObject;
    }

    private function createEntityModelTraitFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_ENTITY_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function createPutEntityModelFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_PUT_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityModelTraitFileObject,
        FileObject $putEntityModelFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityModelTraitFileObject,
            $putEntityModelFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityModelTraitFileObject,
        FileObject $putEntityModelFileObject
    ): PutEntityModelSkeletonModel {
        return $this->putEntityModelSkeletonModelAssembler->create(
            $entityModelTraitFileObject,
            $putEntityModelFileObject
        );
    }

    public function setPutEntityModelSkeletonModelAssembler(
        PutEntityModelSkeletonModelAssembler $putEntityModelSkeletonModelAssembler
    ): void {
        $this->putEntityModelSkeletonModelAssembler = $putEntityModelSkeletonModelAssembler;
    }

    public function setModelFileObjectFactory(ModelFileObjectFactory $modelFileObjectFactory): void
    {
        $this->modelFileObjectFactory = $modelFileObjectFactory;
    }
}
