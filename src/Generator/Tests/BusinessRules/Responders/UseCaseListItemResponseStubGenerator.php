<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\StubFieldUtility;

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
        $entityFileObject = $this->createEntityFileObject($className);
        $entityStubFileObject = $this->createEntityStubFileObject($entityFileObject);
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject($entityFileObject);
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject($entityFileObject);

        $useCaseListItemResponseStubFileObject->setFields($this->generateStubFieldsFromSelectedFields($entityFileObject, $fields));
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

    private function createEntityFileObject(
        string $className
    ): FileObject {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $className
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createEntityStubFileObject(FileObject $fileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
    }

    private function createUseCaseListItemResponseDTOFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
    }

    private function createUseCaseListItemResponseStubFileObject(FileObject $fileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $fileObject->getDomain(),
            $fileObject->getEntity(),
            $fileObject->getBaseNamespace()
        );
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

    private function generateConsts(FileObject $useCaseListItemResponseStubFileObject): array
    {
        $consts = ConstUtility::generateConstsFromStubFileObject($useCaseListItemResponseStubFileObject);

        return $this->filterConstsFromFieldValues($useCaseListItemResponseStubFileObject, $consts);

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

    private function getConstNameFromFieldValues(FileObject $useCaseListItemResponseStubFileObject): array
    {
        $constsNameFromFields = [];
        foreach ($useCaseListItemResponseStubFileObject->getFields() as $field) {
            $const = $field->getValue();
            $constsNameFromFields[] = $const->getName();
        }

        return $constsNameFromFields;
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
}
