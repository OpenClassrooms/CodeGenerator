<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseDTOSkeletonModelAssembler;

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
            $generatorRequest->getEntityClassName(),
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
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);

        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject();
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject();
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject();

        $useCaseListItemResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $useCaseListItemResponseDTOFileObject->setMethods(
            $this->getSelectedAccessors($entityClassName, $fields)
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

    private function createUseCaseListItemResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    public function createUseCaseListItemResponseFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    public function createUseCaseResponseDTOFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): string {
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
    ): UseCaseListItemResponseDTOSkeletonModel {
        return $this->useCaseListItemResponseDTOSkeletonModelAssembler->create(
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseDTOFileObject
        );
    }

    public function setUseCaseListItemResponseDTOSkeletonModelAssembler(
        UseCaseListItemResponseDTOSkeletonModelAssembler $useCaseListItemResponseDTOSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseDTOSkeletonModelAssembler = $useCaseListItemResponseDTOSkeletonModelAssembler;
    }
}
