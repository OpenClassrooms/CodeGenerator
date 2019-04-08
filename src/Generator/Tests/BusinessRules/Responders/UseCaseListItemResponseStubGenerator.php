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
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject(
            $useCaseResponseClassName
        );
        $useCaseListItemResponseStubFileObject = $this->createUseCaseListItemResponseStubFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $entityStubFileObject = $this->createEntityStubFileObject($useCaseListItemResponseDTOFileObject);

        $useCaseListItemResponseStubFileObject->setFields(
            $this->generateStubFields($useCaseListItemResponseDTOFileObject)
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

    private function createUseCaseListItemResponseDTOFileObject(string $responseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($responseClassName);

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createUseCaseListItemResponseStubFileObject(
        FileObject $useCaseListItemResponseFileObject
    ): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity(),
            $useCaseListItemResponseFileObject->getBaseNamespace()
        );
    }

    private function createEntityStubFileObject(FileObject $useCaseListItemResponseDTOFileObject): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity(),
            $useCaseListItemResponseDTOFileObject->getBaseNamespace()
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
        FileObject $useCaseListItemResponseStubFileObject
    ): array
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
    ): string
    {
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
    ): UseCaseListItemResponseStubSkeletonModel
    {
        return $this->useCaseListItemResponseStubSkeletonModelAssembler->create(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseDTOFileObject,
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
