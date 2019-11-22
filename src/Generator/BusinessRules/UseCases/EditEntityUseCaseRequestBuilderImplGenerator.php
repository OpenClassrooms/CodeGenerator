<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

class EditEntityUseCaseRequestBuilderImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var EditEntityUseCaseRequestBuilderImplSkeletonModelAssembler
     */
    private $editEntityUseCaseRequestBuilderImplSkeletonModelAssembler;

    private function buildEditEntityUseCaseRequestBuilderImplFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseRequestBuilderFileObject = $this->createEditEntityUseCaseRequestBuilderFileObject();
        $editEntityUseCaseRequestBuilderImplFileObject = $this->createEditEntityUseCaseRequestBuilderImplFileObject();
        $editEntityUseCaseRequestDTOFileObject = $this->createEditEntityUseCaseRequestDTOFileObject();
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();

        $editEntityUseCaseRequestBuilderImplFileObject->setMethods(
            MethodUtility::buildWitherMethods(
                $entityClassName,
                $editEntityUseCaseRequestBuilderFileObject->getShortName()
            )
        );

        $editEntityUseCaseRequestBuilderImplFileObject->setContent(
            $this->generateContent(
                $editEntityUseCaseRequestBuilderFileObject,
                $editEntityUseCaseRequestBuilderImplFileObject,
                $editEntityUseCaseRequestDTOFileObject,
                $editEntityUseCaseRequestFileObject
            )
        );

        return $editEntityUseCaseRequestBuilderImplFileObject;
    }

    private function createEditEntityUseCaseRequestBuilderFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestBuilderImplFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_BUILDER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_DTO,
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

    private function createSkeletonModel(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestBuilderImplFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): EditEntityUseCaseRequestBuilderImplSkeletonModel {
        return $this->editEntityUseCaseRequestBuilderImplSkeletonModelAssembler->create(
            $editEntityUseCaseRequestBuilderFileObject,
            $editEntityUseCaseRequestBuilderImplFileObject,
            $editEntityUseCaseRequestDTOFileObject,
            $editEntityUseCaseRequestFileObject
        );
    }

    /**
     * @param EditEntityUseCaseRequestBuilderImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $editEntityUseCaseRequestBuilderImplFileObject = $this->buildEditEntityUseCaseRequestBuilderImplFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($editEntityUseCaseRequestBuilderImplFileObject);

        return $editEntityUseCaseRequestBuilderImplFileObject;
    }

    private function generateContent(
        FileObject $editEntityUseCaseRequestBuilderFileObject,
        FileObject $editEntityUseCaseRequestBuilderImplFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject,
        FileObject $editEntityUseCaseRequestFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $editEntityUseCaseRequestBuilderFileObject,
            $editEntityUseCaseRequestBuilderImplFileObject,
            $editEntityUseCaseRequestDTOFileObject,
            $editEntityUseCaseRequestFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setEditEntityUseCaseRequestBuilderImplSkeletonModelAssembler(
        EditEntityUseCaseRequestBuilderImplSkeletonModelAssembler $editEntityUseCaseRequestBuilderImplSkeletonModelAssembler
    ): void {
        $this->editEntityUseCaseRequestBuilderImplSkeletonModelAssembler = $editEntityUseCaseRequestBuilderImplSkeletonModelAssembler;
    }
}
