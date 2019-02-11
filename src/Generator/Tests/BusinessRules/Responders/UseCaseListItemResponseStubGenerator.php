<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\ConstUtility;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
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
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($useCaseListItemResponseStubFileObject);

        return $useCaseListItemResponseStubFileObject;
    }

    private function buildUseCaseListItemResponseStubFileObject(string $useCaseResponseClassName)
    {
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject(
            $useCaseResponseClassName
        );
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject(
            $useCaseListItemResponseFileObject
        );
        $entityStubFileObject = $this->createEntityStubFileObject($useCaseListItemResponseFileObject);

        $useCaseListItemResponseStubFileObject->setFields(
            $this->generateStubFields($useCaseListItemResponseFileObject)
        );
        $useCaseListItemResponseStubFileObject->setConsts(
            $this->generateConsts($entityStubFileObject, $useCaseListItemResponseStubFileObject)
        );
        $useCaseListItemResponseStubFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseStubFileObject,
                $useCaseListItemResponseFileObject,
                $entityStubFileObject
            )
        );

        return $useCaseListItemResponseStubFileObject;
    }

    private function createUseCaseListItemResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = FileObjectUtility::getDomainAndEntityNameFromClassName($responseClassName);

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity
        );
    }

    private function createUseCaseListItemResponseStubFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function createEntityStubFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );
    }

    private function generateStubFields(FileObject $useCaseListItemResponseFileObject): array
    {
        $useCaseListItemResponseFields = $this->getParentAndChildPublicClassFields(
            $useCaseListItemResponseFileObject->getClassName()
        );

        return FieldUtility::generateStubFieldObjects(
            $useCaseListItemResponseFields,
            $useCaseListItemResponseFileObject
        );
    }

    private function generateConsts(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): array
    {
        $useCaseListItemResponseFileObject->setConsts(
            $this->getClassConstants($useCaseListItemResponseFileObject->getClassName())
        );

        $consts = ConstUtility::generateConstsFromStubReference($useCaseListItemResponseFileObject);

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
        FileObject $useCaseListItemResponseFileObject,
        FileObject $entityStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseFileObject,
            $entityStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel
    {
        return $this->useCaseListItemResponseStubSkeletonModelAssembler->create(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseFileObject,
            $entityStubFileObject
        );
    }

    public function setUseCaseListItemResponseStubSkeletonModelAssembler(
        UseCaseListItemResponseStubSkeletonModelAssembler $useCaseListItemResponseStubSkeletonModelAssembler
    ): void
    {
        $this->useCaseListItemResponseStubSkeletonModelAssembler = $useCaseListItemResponseStubSkeletonModelAssembler;
    }
}
