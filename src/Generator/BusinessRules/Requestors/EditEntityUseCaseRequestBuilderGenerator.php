<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\Request\EditEntityUseCaseRequestBuilderGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class EditEntityUseCaseRequestBuilderGenerator extends AbstractUseCaseGenerator
{
    private EditEntityUseCaseRequestBuilderSkeletonModelAssembler $editEntityUseCaseRequestBuilderSkeletonModelAssembler;

    /**
     * @param EditEntityUseCaseRequestBuilderGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $editEntityUseCaseRequestBuilderFileObject = $this->buildEditEntityUseCaseRequestBuilderFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($editEntityUseCaseRequestBuilderFileObject);

        return $editEntityUseCaseRequestBuilderFileObject;
    }

    private function buildEditEntityUseCaseRequestBuilderFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseRequestBuilderFileObject = $this->createEditEntityUseCaseRequestBuilderFileObject();
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();

        $editEntityUseCaseRequestBuilderFileObject->setMethods(
            MethodUtility::buildWitherMethods(
                $entityClassName,
                $editEntityUseCaseRequestBuilderFileObject->getShortName()
            )
        );

        $editEntityUseCaseRequestBuilderFileObject->setContent(
            $this->generateContent(
                $editEntityUseCaseRequestBuilderFileObject,
                $editEntityUseCaseRequestFileObject
            )
        );

        return $editEntityUseCaseRequestBuilderFileObject;
    }

    private function createEditEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $editEntityUseCaseRequestBuilderFileObject,
            $editEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestBuilderSkeletonModel {
        return $this->editEntityUseCaseRequestBuilderSkeletonModelAssembler->create(
            $editEntityUseCaseRequestBuilderFileObject,
            $editEntityUseCaseRequestFileObject
        );
    }

    public function setEditEntityUseCaseRequestBuilderSkeletonModelAssembler(
        EditEntityUseCaseRequestBuilderSkeletonModelAssembler $editEntityUseCaseRequestBuilderSkeletonModelAssembler
    ): void {
        $this->editEntityUseCaseRequestBuilderSkeletonModelAssembler = $editEntityUseCaseRequestBuilderSkeletonModelAssembler;
    }
}
