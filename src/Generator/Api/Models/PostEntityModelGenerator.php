<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\ModelFileObjectFactory;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\ModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\AbstractGenerator;
use OpenClassrooms\CodeGenerator\Generator\Api\Models\Request\PostEntityModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PostEntityModelSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\Models\PostEntityModelSkeletonModelAssembler;

class PostEntityModelGenerator extends AbstractGenerator
{
    /**
     * @var ModelFileObjectFactory
     */
    private $modelFileObjectFactory;

    /**
     * @var PostEntityModelSkeletonModelAssembler
     */
    private $postEntityModelSkeletonModelAssembler;

    /**
     * @param PostEntityModelGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $postEntityModelFileObject = $this->buildPostEntityModelFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($postEntityModelFileObject);

        return $postEntityModelFileObject;
    }

    private function buildPostEntityModelFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $entityModelTraitFileObject = $this->createEntityModelTraitFileObject();
        $postEntityModelFileObject = $this->createPostEntityModelFileObject();

        $postEntityModelFileObject->setContent(
            $this->generateContent($entityModelTraitFileObject, $postEntityModelFileObject)
        );

        return $postEntityModelFileObject;
    }

    private function createEntityModelTraitFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_ENTITY_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function createPostEntityModelFileObject(): FileObject
    {
        return $this->modelFileObjectFactory->create(
            ModelFileObjectType::API_MODEL_POST_ENTITY,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityModelTraitFileObject,
        FileObject $postEntityModelFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($entityModelTraitFileObject, $postEntityModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityModelTraitFileObject,
        FileObject $postEntityModelFileObject
    ): PostEntityModelSkeletonModel {
        return $this->postEntityModelSkeletonModelAssembler->create(
            $entityModelTraitFileObject,
            $postEntityModelFileObject
        );
    }

    public function setPostEntityModelSkeletonModelAssembler(
        PostEntityModelSkeletonModelAssembler $postEntityModelSkeletonModelAssembler
    ): void {
        $this->postEntityModelSkeletonModelAssembler = $postEntityModelSkeletonModelAssembler;
    }

    public function setModelFileObjectFactory(ModelFileObjectFactory $modelFileObjectFactory): void
    {
        $this->modelFileObjectFactory = $modelFileObjectFactory;
    }
}
