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

    private function buildEditEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $editEntityUseCaseRequestFileObject = $this->createEditEntityUseCaseRequestFileObject();
        $editEntityUseCaseRequestDTOFileObject = $this->createEditEntityUseCaseRequestDTOFileObject();
        $entityUseCaseCommonRequestTraitFileObject = $this->createEntityUseCaseCommonRequestTraitFileObject();

        $editEntityUseCaseRequestDTOFileObject->setFields($this->buildEditUseCaseRequestDTOFields($entityClassName));
        $editEntityUseCaseRequestDTOFileObject->setMethods($this->buildEditUseCaseRequestDTOMethods($entityClassName));

        $editEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent(
                $editEntityUseCaseRequestFileObject,
                $editEntityUseCaseRequestDTOFileObject,
                $entityUseCaseCommonRequestTraitFileObject
            )
        );

        return $editEntityUseCaseRequestDTOFileObject;
    }

    private function createEditEntityUseCaseRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createEditEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createEditEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function createEditEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->createEditEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_EDIT_ENTITY_USE_CASE_REQUEST
        );
    }

    private function createEntityUseCaseCommonRequestTraitFileObject(): FileObject
    {
        return $this->createEditEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_ENTITY_USE_CASE_COMMON_REQUEST
        );
    }

    private function createSkeletonModel(
        FileObject $editEntityUseCaseRequestFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject,
        FileObject $entityUseCaseCommonRequestTraitFileObject
    ): EditEntityUseCaseRequestDTOSkeletonModel {
        return $this->editEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $editEntityUseCaseRequestFileObject,
            $editEntityUseCaseRequestDTOFileObject,
            $entityUseCaseCommonRequestTraitFileObject
        );
    }

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

    private function generateContent(
        FileObject $editEntityUseCaseRequestFileObject,
        FileObject $editEntityUseCaseRequestDTOFileObject,
        FileObject $entityUseCaseCommonRequestTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $editEntityUseCaseRequestFileObject,
            $editEntityUseCaseRequestDTOFileObject,
            $entityUseCaseCommonRequestTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setEditEntityUseCaseRequestDTOSkeletonModelAssembler(
        EditEntityUseCaseRequestDTOSkeletonModelAssembler $editEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->editEntityUseCaseRequestDTOSkeletonModelAssembler = $editEntityUseCaseRequestDTOSkeletonModelAssembler;
    }
}
