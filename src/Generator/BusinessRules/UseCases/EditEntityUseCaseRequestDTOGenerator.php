<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\EditEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\EditEntityUseCaseRequestDTOSkeletonModelAssembler;

class EditEntityUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
{
    use EditUseCaseRequestFieldTrait;
    use EditUseCaseRequestMethodTrait;

    /**
     * @var EditEntityUseCaseRequestDTOSkeletonModelAssembler
     */
    private $editEntityUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @param EditEntityUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $editEntityUseCaseRequestDTOFileObject = $this->buildEditEntityUseCaseRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($editEntityUseCaseRequestDTOFileObject);

        return $editEntityUseCaseRequestDTOFileObject;
    }

    public function setEditEntityUseCaseRequestDTOSkeletonModelAssembler(
        EditEntityUseCaseRequestDTOSkeletonModelAssembler $editEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->editEntityUseCaseRequestDTOSkeletonModelAssembler = $editEntityUseCaseRequestDTOSkeletonModelAssembler;
    }

    private function buildEditEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();
        $editEntityUseCaseRequestDTOFileObject = $this->createEditEntityUseCaseRequestDTOFileObject();

        $editEntityUseCaseRequestDTOFileObject->setFields($this->buildEditUseCaseRequestFields($entityClassName));
        $editEntityUseCaseRequestDTOFileObject->setMethods($this->buildEditUseCaseRequestMethods($entityClassName));

        $editEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent($editEntityUseCaseRequestFileObject, $editEntityUseCaseRequestDTOFileObject)
        );

        return $editEntityUseCaseRequestDTOFileObject;
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
        FileObject $editEntityUseCaseRequestFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject
    ): EditEntityUseCaseRequestDTOSkeletonModel {
        return $this->editEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $editEntityUseCaseRequestFileObject,
            $editEntityUseCaseRequestDTOFileObject
        );
    }

    private function generateContent(
        FileObject $editEntityUseCaseRequestFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $editEntityUseCaseRequestFileObject,
            $editEntityUseCaseRequestDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }
}
