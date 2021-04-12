<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseSkeletonModelAssembler;

class UseCaseListItemResponseGenerator extends AbstractUseCaseGenerator
{
    private UseCaseListItemResponseSkeletonModelAssembler $useCaseListItemResponseSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseFileObject = $this->buildUseCaseListItemResponseFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($useCaseListItemResponseFileObject);

        return $useCaseListItemResponseFileObject;
    }

    private function buildUseCaseListItemResponseFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();

        $useCaseListItemResponseFileObject->setContent(
            $this->generateContent($useCaseListItemResponseFileObject, $useCaseResponseFileObject)
        );

        return $useCaseListItemResponseFileObject;
    }

    private function createUseCaseListItemResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseFileObject,
            $useCaseResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseListItemResponseSkeletonModel {
        return $this->useCaseListItemResponseSkeletonModelAssembler->create(
            $useCaseListItemResponseFileObject,
            $useCaseResponseFileObject
        );
    }

    public function setUseCaseListItemResponseSkeletonModelAssembler(
        UseCaseListItemResponseSkeletonModelAssembler $useCaseListItemResponseSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseSkeletonModelAssembler = $useCaseListItemResponseSkeletonModelAssembler;
    }
}
