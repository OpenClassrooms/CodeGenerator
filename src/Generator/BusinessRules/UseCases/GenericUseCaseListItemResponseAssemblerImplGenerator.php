<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseListItemResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseAssemblerImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler
     */
    private $genericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler;

    /**
     * @param GenericUseCaseListItemResponseAssemblerImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseListItemResponseAssemblerImplFileObject = $this->buildGenericUseCaseListItemResponseAssemblerImplFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseListItemResponseAssemblerImplFileObject);

        return $genericUseCaseListItemResponseAssemblerImplFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildGenericUseCaseListItemResponseAssemblerImplFileObject(
        string $entityClassName,
        array $fields
    ): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);

        $genericUseCaseListItemResponseAssemblerFileObject = $this->createGenericUseCaseListItemResponseAssemblerFileObject(
            $entityFileObject
        );
        $genericUseCaseListItemResponseAssemblerImplFileObject = $this->createGenericUseCaseListItemResponseAssemblerImplFileObject(
            $entityFileObject
        );
        $genericUseCaseListItemResponseDTOFileObject = $this->createGenericUseCaseListItemResponseDTO(
            $entityFileObject
        );
        $genericUseCaseListItemResponseFileObject = $this->createGenericUseCaseListItemResponseFileObject(
            $entityFileObject
        );
        $genericUseCaseResponseTraitFileObject = $this->createGenericUseCaseResponseTraitFileObject(
            $entityFileObject
        );

        $entityFileObject->setMethods(MethodUtility::getSelectedAccessors($entityClassName, $fields));

        $genericUseCaseListItemResponseAssemblerImplFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $genericUseCaseListItemResponseAssemblerFileObject,
                $genericUseCaseListItemResponseAssemblerImplFileObject,
                $genericUseCaseListItemResponseDTOFileObject,
                $genericUseCaseListItemResponseFileObject,
                $genericUseCaseResponseTraitFileObject
            )
        );

        return $genericUseCaseListItemResponseAssemblerImplFileObject;
    }

    private function createEntityFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    private function createGenericUseCaseListItemResponseAssemblerFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function createGenericUseCaseListItemResponseAssemblerImplFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function createGenericUseCaseListItemResponseDTO(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function createGenericUseCaseListItemResponseFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function createGenericUseCaseResponseTraitFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerImplFileObject,
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $genericUseCaseListItemResponseAssemblerFileObject,
            $genericUseCaseListItemResponseAssemblerImplFileObject,
            $genericUseCaseListItemResponseDTOFileObject,
            $genericUseCaseListItemResponseFileObject,
            $genericUseCaseResponseTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerFileObject,
        FileObject $genericUseCaseListItemResponseAssemblerImplFileObject,
        FileObject $genericUseCaseListItemResponseDTOFileObject,
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): GenericUseCaseListItemResponseAssemblerImplSkeletonModel
    {
        return $this->genericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler->create(
            $entityFileObject,
            $genericUseCaseListItemResponseAssemblerFileObject,
            $genericUseCaseListItemResponseAssemblerImplFileObject,
            $genericUseCaseListItemResponseDTOFileObject,
            $genericUseCaseListItemResponseFileObject,
            $genericUseCaseResponseTraitFileObject
        );
    }

    public function setGenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler(
        GenericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler $genericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler = $genericUseCaseListItemResponseAssemblerImplSkeletonModelAssembler;
    }
}
