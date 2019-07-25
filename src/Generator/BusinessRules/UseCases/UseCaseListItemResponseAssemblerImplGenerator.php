<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseListItemResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseAssemblerImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseListItemResponseAssemblerImplSkeletonModelAssembler
     */
    private $useCaseListItemResponseAssemblerImplSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseAssemblerImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseAssemblerImplFileObject = $this->buildUseCaseListItemResponseAssemblerImplFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseListItemResponseAssemblerImplFileObject);

        return $useCaseListItemResponseAssemblerImplFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildUseCaseListItemResponseAssemblerImplFileObject(
        string $entityClassName,
        array $fields
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);

        $entityFileObject = $this->createEntityFileObject();
        $useCaseListItemResponseAssemblerFileObject = $this->createUseCaseListItemResponseAssemblerFileObject();
        $useCaseListItemResponseAssemblerImplFileObject = $this->createUseCaseListItemResponseAssemblerImplFileObject();
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTO();
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject();
        $useCaseResponseTraitFileObject = $this->createUseCaseResponseTraitFileObject();

        $entityFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));

        $useCaseListItemResponseAssemblerImplFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $useCaseListItemResponseAssemblerFileObject,
                $useCaseListItemResponseAssemblerImplFileObject,
                $useCaseListItemResponseDTOFileObject,
                $useCaseListItemResponseFileObject,
                $useCaseResponseTraitFileObject
            )
        );

        return $useCaseListItemResponseAssemblerImplFileObject;
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

    private function createUseCaseListItemResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseAssemblerImplFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseDTO(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseListItemResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseResponseTraitFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseListItemResponseAssemblerFileObject,
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $useCaseListItemResponseAssemblerFileObject,
            $useCaseListItemResponseAssemblerImplFileObject,
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $useCaseListItemResponseAssemblerFileObject,
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): UseCaseListItemResponseAssemblerImplSkeletonModel {
        return $this->useCaseListItemResponseAssemblerImplSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseListItemResponseAssemblerFileObject,
            $useCaseListItemResponseAssemblerImplFileObject,
            $useCaseListItemResponseDTOFileObject,
            $useCaseListItemResponseFileObject,
            $useCaseResponseTraitFileObject
        );
    }

    public function setUseCaseListItemResponseAssemblerImplSkeletonModelAssembler(
        UseCaseListItemResponseAssemblerImplSkeletonModelAssembler $useCaseListItemResponseAssemblerImplSkeletonModelAssembler
    ): void {
        $this->useCaseListItemResponseAssemblerImplSkeletonModelAssembler = $useCaseListItemResponseAssemblerImplSkeletonModelAssembler;
    }
}
