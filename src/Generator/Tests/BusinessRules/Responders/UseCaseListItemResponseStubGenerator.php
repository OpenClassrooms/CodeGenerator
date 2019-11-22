<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;
use OpenClassrooms\CodeGenerator\Utility\StubUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubGenerator extends AbstractUseCaseResponseStubGenerator
{
    /**
     * @var UseCaseListItemResponseStubSkeletonModelAssembler
     */
    private $useCaseListItemResponseStubSkeletonModelAssembler;

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

        $fileObject = StubUtility::incrementSuffix($fileObject, $this->fileObjectGateway->findAll());

        return $fileObject;
    }

    /**
     * @param ConstObject[]
     *
     * @return ConstObject[]
     */
    private function filterConstsFromFieldValues(FileObject $useCaseListItemResponseStubFileObject, array $consts)
    {
        $constsNameFromFields = $this->getConstNameFromFieldValues($useCaseListItemResponseStubFileObject);

        foreach ($consts as $key => $const) {
            if (!in_array($const->getName(), $constsNameFromFields)) {
                unset($consts[$key]);
            }
        }

        return $consts;
    }

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

    private function generateConsts(FileObject $useCaseListItemResponseStubFileObject): array
    {
        $consts = ConstUtility::generateConstsFromStubFileObject($useCaseListItemResponseStubFileObject);

        return $this->filterConstsFromFieldValues($useCaseListItemResponseStubFileObject, $consts);
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

    /**
     * @param string[] $fields
     */
    private function generateStubFieldsFromSelectedFields(FileObject $entityFileObject, array $fields): array
    {
        $useCaseListItemResponseFields = $this->getSelectedFields(
            $entityFileObject->getClassName(),
            $fields
        );

        return StubFieldUtility::generateStubFieldObjects(
            $useCaseListItemResponseFields,
            $entityFileObject
        );
    }

    private function getConstNameFromFieldValues(FileObject $useCaseListItemResponseStubFileObject): array
    {
        $constsNameFromFields = [];
        foreach ($useCaseListItemResponseStubFileObject->getFields() as $field) {
            $const = $field->getValue();
            $constsNameFromFields[] = $const->getName();
        }

        return $constsNameFromFields;
    }

    public function setUseCaseListItemResponseStubSkeletonModelAssembler(
        UseCaseListItemResponseStubSkeletonModelAssembler $useCaseListItemResponseStubSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseStubSkeletonModelAssembler = $useCaseListItemResponseStubSkeletonModelAssembler;
    }
}
