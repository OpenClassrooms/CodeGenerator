<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseAssemblerImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseAssemblerImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseAssemblerImplSkeletonModelAssembler
     */
    private $useCaseDetailResponseAssemblerImplSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseAssemblerImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseAssemblerImplFileObject = $this->buildUseCaseDetailResponseAssemblerImplFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseDetailResponseAssemblerImplFileObject);

        return $useCaseDetailResponseAssemblerImplFileObject;
    }

    /**
     * @param String[] $fields
     */
    private function buildUseCaseDetailResponseAssemblerImplFileObject(
        string $entityClassName,
        array $fields
    ): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $useCaseDetailResponseAssemblerFileObject = $this->createUseCaseDetailResponseAssemblerFileObject(
            $entityFileObject
        );
        $useCaseDetailResponseAssemblerImplFileObject =
            $this->createUseCaseDetailResponseAssemblerImplFileObject($entityFileObject);
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $entityFileObject
        );
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject(
            $entityFileObject
        );
        $genericUseCaseTraitFileObject = $this->createGenericUseCaseTrait($entityFileObject);

        $entityFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));

        $useCaseDetailResponseAssemblerImplFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $useCaseDetailResponseAssemblerFileObject,
                $useCaseDetailResponseAssemblerImplFileObject,
                $useCaseDetailResponseDTOFileObject,
                $useCaseDetailResponseFileObject,
                $genericUseCaseTraitFileObject
            )
        );

        return $useCaseDetailResponseAssemblerImplFileObject;
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

    private function createUseCaseDetailResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseAssemblerImplFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGenericUseCaseTrait(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject,
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $useCaseDetailResponseAssemblerFileObject,
            $useCaseDetailResponseAssemblerImplFileObject,
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $genericUseCaseTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject,
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): UseCaseDetailResponseAssemblerImplSkeletonModel
    {
        return $this->useCaseDetailResponseAssemblerImplSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseDetailResponseAssemblerFileObject,
            $useCaseDetailResponseAssemblerImplFileObject,
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $genericUseCaseTraitFileObject
        );
    }

    public function setUseCaseDetailResponseAssemblerImplSkeletonModelAssembler(
        UseCaseDetailResponseAssemblerImplSkeletonModelAssembler $useCaseDetailResponseAssemblerImplSkeletonModelAssembler
    ): void
    {
        $this->useCaseDetailResponseAssemblerImplSkeletonModelAssembler = $useCaseDetailResponseAssemblerImplSkeletonModelAssembler;
    }
}
