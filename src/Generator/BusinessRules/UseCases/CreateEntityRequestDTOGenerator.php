<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseRequestFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\CreateEntityRequestDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\CreateEntityRequestDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;
use OpenClassrooms\CodeGenerator\Utility\MethodUtilityStrategy;

class CreateEntityRequestDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var CreateEntityRequestDTOSkeletonModelAssembler
     */
    private $createEntityRequestDTOSkeletonModelAssembler;

    /**
     * @var FieldObjectUtilityStrategy
     */
    private $fieldUtility;

    /**
     * @var MethodUtilityStrategy
     */
    private $methodUtility;

    /**
     * @param CreateEntityRequestDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $createEntityRequestDTOFileObject = $this->buildCreateEntityRequestDTOFileObject(
            $generatorRequest->getEntityClassName()
        );

        $this->insertFileObject($createEntityRequestDTOFileObject);

        return $createEntityRequestDTOFileObject;
    }

    private function buildCreateEntityRequestDTOFileObject(string $entityClassName): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $createEntityRequestFileObject = $this->createCreateEntityRequestFileObject();
        $createEntityRequestDTOFileObject = $this->createCreateEntityRequestDTOFileObject();

        $createEntityRequestDTOFileObject->setFields($this->fieldUtility->getFields($entityClassName));
        $createEntityRequestDTOFileObject->setMethods($this->methodUtility->getAccessors($entityClassName));

        $createEntityRequestDTOFileObject->setContent(
            $this->generateContent($createEntityRequestFileObject, $createEntityRequestDTOFileObject)
        );

        return $createEntityRequestDTOFileObject;
    }

    private function createCreateEntityRequestFileObject(): FileObject
    {
        return $this->createCreateEntityRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST
        );
    }

    private function createCreateEntityRequest(string $type): FileObject
    {
        return $this->useCaseRequestFileObjectFactory->create(
            $type,
            $this->domain,
            $this->entity
        );
    }

    private function createCreateEntityRequestDTOFileObject(): FileObject
    {
        return $this->createCreateEntityRequest(
            UseCaseRequestFileObjectType::BUSINESS_RULES_CREATE_ENTITY_USE_CASE_REQUEST_DTO
        );
    }

    private function generateContent(
        FileObject $createEntityRequestFileObject,
        FileObject $createEntityRequestDTOFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($createEntityRequestFileObject, $createEntityRequestDTOFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $createEntityRequestFileObject,
        FileObject $createEntityRequestDTOFileObject
    ): CreateEntityRequestDTOSkeletonModel {
        return $this->createEntityRequestDTOSkeletonModelAssembler->create(
            $createEntityRequestFileObject,
            $createEntityRequestDTOFileObject
        );
    }

    public function setCreateEntityRequestDTOSkeletonModelAssembler(
        CreateEntityRequestDTOSkeletonModelAssembler $createEntityRequestDTOSkeletonModelAssembler
    ): void {
        $this->createEntityRequestDTOSkeletonModelAssembler = $createEntityRequestDTOSkeletonModelAssembler;
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
