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
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
            $generatorRequest->getEntity(),
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
    ): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);

        $useCaseListItemResponseAssemblerFileObject = $this->createUseCaseListItemResponseAssemblerFileObject(
            $entityFileObject
        );
        $useCaseListItemResponseAssemblerImplFileObject = $this->createUseCaseListItemResponseAssemblerImplFileObject(
            $entityFileObject
        );
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTO(
            $entityFileObject
        );
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject(
            $entityFileObject
        );
        $useCaseResponseTraitFileObject = $this->createUseCaseResponseTraitFileObject(
            $entityFileObject
        );

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

    private function createUseCaseListItemResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseAssemblerImplFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_ASSEMBLER_IMPL,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseDTO(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseListItemResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseResponseTraitFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseListItemResponseAssemblerFileObject,
        FileObject $useCaseListItemResponseAssemblerImplFileObject,
        FileObject $useCaseListItemResponseDTOFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): string
    {
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
    ): UseCaseListItemResponseAssemblerImplSkeletonModel
    {
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
    ): void
    {
        $this->useCaseListItemResponseAssemblerImplSkeletonModelAssembler = $useCaseListItemResponseAssemblerImplSkeletonModelAssembler;
    }
}
