<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseListItemResponseDTOSkeletonModelAssembler
     */
    private $useCaseListItemResponseDTOSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseDTOFileObject = $this->buildUseCaseListItemResponseDTOFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseListItemResponseDTOFileObject);

        return $useCaseListItemResponseDTOFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildUseCaseListItemResponseDTOFileObject(
        string $entityClassName,
        array $fields
    ): FileObject
    {
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject(
            $entityClassName
        );
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject(
            $useCaseListItemResponseDTOFileObject
        );
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject(
            $useCaseListItemResponseDTOFileObject
        );

        $useCaseListItemResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $useCaseListItemResponseDTOFileObject->setMethods(
            MethodUtility::getSelectedAccessors($entityClassName, $fields)
        );

        $useCaseListItemResponseDTOFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseDTOFileObject,
                $useCaseListItemResponseFileObject,
                $useCaseResponseDTOFileObject
            )
        );

        return $useCaseListItemResponseDTOFileObject;
    }

    private function createUseCaseListItemResponseDTOFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    public function createUseCaseListItemResponseFileObject(
        FileObject $useCaseListItemResponseDTOFileObject
    )
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity()
        );
    }

    public function createUseCaseResponseDTOFileObject(FileObject $useCaseListItemResponseDTOFileObject)
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $useCaseListItemResponseDTOFileObject->getDomain(),
            $useCaseListItemResponseDTOFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseListItemResponseDTOSkeletonModel
    {
        return $this->useCaseListItemResponseDTOSkeletonModelAssembler->create(
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseDTOFileObject
        );
    }

    public function setUseCaseListItemResponseDTOSkeletonModelAssembler(
        UseCaseListItemResponseDTOSkeletonModelAssembler $useCaseListItemResponseDTOSkeletonModelAssembler
    ): void
    {
        $this->useCaseListItemResponseDTOSkeletonModelAssembler = $useCaseListItemResponseDTOSkeletonModelAssembler;
    }
}
