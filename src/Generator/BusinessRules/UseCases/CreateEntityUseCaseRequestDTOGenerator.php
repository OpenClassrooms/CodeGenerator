<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityUseCaseRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class CreateEntityUseCaseRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityUseCaseRequestDTOSkeletonModelAssembler
     */
    private $createEntityUseCaseRequestDTOSkeletonModelAssembler;

    /**
     * @var FieldObjectUtilityStrategy
     */
    private $fieldUtility;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    /**
     * @param CreateEntityUseCaseRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityUseCaseRequestDTOFileObject = $this->buildCreateEntityUseCaseRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityUseCaseRequestDTOFileObject);

        return $createEntityUseCaseRequestDTOFileObject;
    }

    private function buildCreateEntityUseCaseRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityUseCaseRequestFileObject = $this->createCreateEntityUseCaseRequestFileObject();
        $createEntityUseCaseRequestDTOFileObject = $this->createCreateEntityUseCaseRequestDTOFileObject();

        $createEntityUseCaseRequestDTOFileObject->setFields($this->fieldUtility->getFields($entityClassName));
        $createEntityUseCaseRequestDTOFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $createEntityUseCaseRequestDTOFileObject->setContent(
            $this->generateContent($createEntityUseCaseRequestFileObject, $createEntityUseCaseRequestDTOFileObject)
        );

        return $createEntityUseCaseRequestDTOFileObject;
    }

    private function createCreateEntityUseCaseRequestFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST
        );
    }

    private function createCreateEntityUseCaseRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityUseCaseRequestDTOFileObject(): FileObject
    {
        return $this->createCreateEntityUseCaseRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function generateContent(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($createEntityUseCaseRequestFileObject, $createEntityUseCaseRequestDTOFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityUseCaseRequestFileObject,
        FileObject $createEntityUseCaseRequestDTOFileObject
    ): CreateEntityUseCaseRequestDTOSkeletonModel {
        return $this->createEntityUseCaseRequestDTOSkeletonModelAssembler->create(
            $createEntityUseCaseRequestFileObject,
            $createEntityUseCaseRequestDTOFileObject
        );
    }

    public function setCreateEntityUseCaseRequestDTOSkeletonModelAssembler(
        CreateEntityUseCaseRequestDTOSkeletonModelAssembler $createEntityUseCaseRequestDTOSkeletonModelAssembler
    ): void {
        $this->createEntityUseCaseRequestDTOSkeletonModelAssembler = $createEntityUseCaseRequestDTOSkeletonModelAssembler;
    }

    public function setFieldUtility(FieldObjectUtilityStrategy $fieldUtility): void
    {
        $this->fieldUtility = $fieldUtility;
    }

    public function setMethodUtility(MethodUtilityStrategy $methodUtility): void
    {
        $this->methodUtility = $methodUtility;
    }
}
