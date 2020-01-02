<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PatchEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PatchEntityModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PatchEntityModelSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility;

class PatchEntityModelGenerator extends AbstractGenerator
{
    /**
     * @var ModelFileObjectFactory
     */
    private $modelFileObjectFactory;

    /**
     * @var PatchEntityModelSkeletonModelAssembler
     */
    private $patchEntityModelSkeletonModelAssembler;

    /**
     * @param PatchEntityModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $patchEntityModelFileObject = $this->buildPatchEntityModelFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($patchEntityModelFileObject);

        return $patchEntityModelFileObject;
    }

    private function buildPatchEntityModelFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityModelTraitFileObject = $this->createEntityModelTraitFileObject();
        $patchEntityModelFileObject = $this->createPatchEntityModelFileObject();
        $patchEntityModelFileObject->setFields(FieldObjectUtility::buildIsUpdatedFields($entityClassName, 'false'));
        $patchEntityModelFileObject->setConsts(ConstUtility::generatePatchModelConsts($entityClassName));

        $patchEntityModelFileObject->setContent(
            $this->generateContent($entityModelTraitFileObject, $patchEntityModelFileObject)
        );

        return $patchEntityModelFileObject;
    }

    private function createEntityModelTraitFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::MODEL_ENTITY_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function createPatchEntityModelFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::MODEL_PATCH_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityModelTraitFileObject,
        FileObject $patchEntityModelFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($entityModelTraitFileObject, $patchEntityModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityModelTraitFileObject,
        FileObject $patchEntityModelFileObject
    ): PatchEntityModelSkeletonModel {
        return $this->patchEntityModelSkeletonModelAssembler->create(
            $entityModelTraitFileObject,
            $patchEntityModelFileObject
        );
    }

    public function setPatchEntityModelSkeletonModelAssembler(
        PatchEntityModelSkeletonModelAssembler $patchEntityModelSkeletonModelAssembler
    ): void {
        $this->patchEntityModelSkeletonModelAssembler = $patchEntityModelSkeletonModelAssembler;
    }

    public function setModelFileObjectFactory(ModelFileObjectFactory $modelFileObjectFactory): void
    {
        $this->modelFileObjectFactory = $modelFileObjectFactory;
    }
}
