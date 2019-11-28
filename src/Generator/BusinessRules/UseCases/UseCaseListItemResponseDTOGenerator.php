<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
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
        $useCaseResponseCommonFieldTraitFileObject = $this->createUseCaseResponseCommonFieldTraitFileObject();

        $useCaseListItemResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $useCaseListItemResponseDTOFileObject->setMethods(
            $this->getSelectedAccessors($entityClassName, $fields)
        );

        $useCaseListItemResponseDTOFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseDTOFileObject,
                $useCaseListItemResponseFileObject,
                $useCaseResponseCommonFieldTraitFileObject
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

    public function createUseCaseResponseCommonFieldTraitFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseCommonFieldTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseListItemResponseDTOSkeletonModel {
        return $this->useCaseListItemResponseDTOSkeletonModelAssembler->create(
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseCommonFieldTraitFileObject
        );
    }

    public function setUseCaseListItemResponseDTOSkeletonModelAssembler(
        UseCaseListItemResponseDTOSkeletonModelAssembler $useCaseListItemResponseDTOSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseDTOSkeletonModelAssembler = $useCaseListItemResponseDTOSkeletonModelAssembler;
    }
}
