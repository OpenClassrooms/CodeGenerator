<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\StubFieldObjectTrait;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;
use OpenClassrooms\CodeGenerator\Utility\StubSuffixUtility;

class UseCaseListItemResponseStubGenerator extends AbstractUseCaseResponseStubGenerator
{
    use StubFieldObjectTrait;

    private UseCaseListItemResponseStubSkeletonModelAssembler $useCaseListItemResponseStubSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseStubFileObject = $this->buildUseCaseListItemResponseStubFileObject(
            $generatorRequest->getClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseListItemResponseStubFileObject);

        return $useCaseListItemResponseStubFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildUseCaseListItemResponseStubFileObject(string $className, array $fields = [])
    {
        $this->initFileObjectParameter($className);
        $entityFileObject = $this->createEntityFileObject();
        $entityStubFileObject = $this->createEntityStubFileObject();
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject();
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject();

        $this->updateEntityStubIndexFromResponseStub($entityStubFileObject, $useCaseListItemResponseStubFileObject);

        $useCaseListItemResponseStubFileObject->setFields(
            $this->generateStubFieldsFromSelectedFields($entityFileObject, $fields)
        );
        $useCaseListItemResponseStubFileObject->setConsts(
            $this->generateConsts($useCaseListItemResponseStubFileObject)
        );
        $useCaseListItemResponseStubFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseStubFileObject,
                $useCaseListItemResponseDTOFileObject,
                $entityStubFileObject
            )
        );

        return $useCaseListItemResponseStubFileObject;
    }

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createEntityStubFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseListItemResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseListItemResponseStubFileObject(): FileObject
    {
        $fileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );

        return StubSuffixUtility::incrementClassNameSuffix($fileObject, $this->fileObjectGateway->findAll());
    }

    /**
     * @param string[] $fields
     */
    private function generateStubFieldsFromSelectedFields(FileObject $entityFileObject, array $fields): array
    {
        $useCaseListItemResponseFields = $this->getSelectedFields(
            $entityFileObject->getClassName(),
            $fields
        );

        $stubFieldsObjects = StubFieldUtility::generateStubFieldObjects($useCaseListItemResponseFields);

        return $this->buildStubFieldObjects($entityFileObject, $stubFieldsObjects);
    }

    /**
     * @param string[] $fields
     *
     * @return FieldObject[]
     */
    protected function getSelectedFields(string $entityClassName, array $fields): array
    {
        if (empty($fields)) {
            return $this->getProtectedClassFields($entityClassName);
        }

        return $this->deleteNotSelectedField($entityClassName, $fields);
    }

    private function generateConsts(FileObject $useCaseListItemResponseStubFileObject): array
    {
        return ConstUtility::generateConstsFromStubFileObject($useCaseListItemResponseStubFileObject);
    }

    private function generateContent(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $entityStubFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseDTOFileObject,
            $entityStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel {
        return $this->useCaseListItemResponseStubSkeletonModelAssembler->create(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseDTOFileObject,
            $entityStubFileObject
        );
    }

    public function setUseCaseListItemResponseStubSkeletonModelAssembler(
        UseCaseListItemResponseStubSkeletonModelAssembler $useCaseListItemResponseStubSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseStubSkeletonModelAssembler = $useCaseListItemResponseStubSkeletonModelAssembler;
    }

    private function updateEntityStubIndexFromResponseStub(
        FileObject $entityStubFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): void {
        $className = $entityStubFileObject->getClassName();
        $stubSuffix = StubSuffixUtility::getStubIndex($useCaseListItemResponseStubFileObject);
        $className = preg_replace('/Stub(\d+)/', $stubSuffix, $className);
        $entityStubFileObject->setClassName($className);
    }
}
