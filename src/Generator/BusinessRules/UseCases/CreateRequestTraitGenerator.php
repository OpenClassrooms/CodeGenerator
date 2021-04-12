<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateRequestTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateRequestTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateRequestTraitSkeletonModelAssembler;

class CreateRequestTraitGenerator extends AbstractUseCaseGenerator
{
    private CreateRequestTraitSkeletonModelAssembler $createRequestTraitSkeletonModelAssembler;

    /**
     * @param CreateRequestTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createRequestTraitFileObject = $this->buildCreateRequestTraitFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createRequestTraitFileObject);

        return $createRequestTraitFileObject;
    }

    private function buildCreateRequestTraitFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createRequestTraitFileObject = $this->createCreateRequestTraitFileObject();

        $createRequestTraitFileObject->setContent($this->generateContent($createRequestTraitFileObject));

        return $createRequestTraitFileObject;
    }

    private function createCreateRequestTraitFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_REQUEST_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(FileObject $createRequestTraitFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($createRequestTraitFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(FileObject $createRequestTraitFileObject): CreateRequestTraitSkeletonModel
    {
        return $this->createRequestTraitSkeletonModelAssembler->create($createRequestTraitFileObject);
    }

    public function setCreateRequestTraitSkeletonModelAssembler(
        CreateRequestTraitSkeletonModelAssembler $createRequestTraitSkeletonModelAssembler
    ): void {
        $this->createRequestTraitSkeletonModelAssembler = $createRequestTraitSkeletonModelAssembler;
    }
}
