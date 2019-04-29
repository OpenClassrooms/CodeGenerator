<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseListItemResponseDTOSkeletonModelAssembler
     */
    private $genericUseCaseListItemResponseDTOSkeletonModelAssembler;

    /**
     * @param GenericUseCaseListItemResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseListItemResponseDTOFileObject = $this->buildGenericUseCaseListItemResponseDTOFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseListItemResponseDTOFileObject);

        return $genericUseCaseListItemResponseDTOFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildGenericUseCaseListItemResponseDTOFileObject(
        string $entityClassName,
        array $fields
    ): FileObject
    {
        $genericUseCaseListItemResponseDTOFileObject = $this->createGenericUseCaseListItemResponseDTOFileObject(
            $entityClassName
        );
        $genericUseCaseListItemResponseFileObject = $this->createGenericUseCaseListItemResponseFileObject(
            $genericUseCaseListItemResponseDTOFileObject
        );
        $genericUseCaseResponseDTOFileObject = $this->createGenericUseCaseResponseDTOFileObject(
            $genericUseCaseListItemResponseDTOFileObject
        );

        $genericUseCaseListItemResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $genericUseCaseListItemResponseDTOFileObject->setMethods(
            MethodUtility::getSelectedAccessors($entityClassName, $fields)
        );

        $genericUseCaseListItemResponseDTOFileObject->setContent(
            $this->generateContent(
                $genericUseCaseListItemResponseDTOFileObject,
                $genericUseCaseListItemResponseFileObject,
                $genericUseCaseResponseDTOFileObject
            )
        );

        return $genericUseCaseListItemResponseDTOFileObject;
    }

    private function createGenericUseCaseListItemResponseDTOFileObject(string $entityClassName): FileObject
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

    public function createGenericUseCaseListItemResponseFileObject(
        FileObject $genericUseCaseListItemResponseDTOFileObject
    )
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $genericUseCaseListItemResponseDTOFileObject->getDomain(),
            $genericUseCaseListItemResponseDTOFileObject->getEntity()
        );
    }

    public function createGenericUseCaseResponseDTOFileObject(FileObject $genericUseCaseListItemResponseDTOFileObject)
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $genericUseCaseListItemResponseDTOFileObject->getDomain(),
            $genericUseCaseListItemResponseDTOFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseListItemResponseDTOFileObject,
            $genericUseCaseListItemResponseFileObject,
            $genericUseCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseListItemResponseDTOSkeletonModel
    {
        return $this->genericUseCaseListItemResponseDTOSkeletonModelAssembler->create(
            $genericUseCaseListItemResponseDTOFileObject,
            $genericUseCaseListItemResponseFileObject,
            $genericUseCaseResponseDTOFileObject
        );
    }

    public function setGenericUseCaseListItemResponseDTOSkeletonModelAssembler(
        GenericUseCaseListItemResponseDTOSkeletonModelAssembler $genericUseCaseListItemResponseDTOSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseListItemResponseDTOSkeletonModelAssembler = $genericUseCaseListItemResponseDTOSkeletonModelAssembler;
    }
}
