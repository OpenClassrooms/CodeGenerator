<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseAssemblerImplSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseAssemblerImplGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler
     */
    private $genericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler;

    /**
     * @param GenericUseCaseDetailResponseAssemblerImplGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseDetailResponseAssemblerImplFileObject = $this->buildGenericUseCaseDetailResponseAssemblerImplFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseDetailResponseAssemblerImplFileObject);

        return $genericUseCaseDetailResponseAssemblerImplFileObject;
    }

    /**
     * @param String[] $fields
     */
    private function buildGenericUseCaseDetailResponseAssemblerImplFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $genericUseCaseDetailResponseAssemblerFileObject = $this->createGenericUseCaseDetailResponseAssemblerFileObject(
            $entityFileObject
        );
        $genericUseCaseDetailResponseAssemblerImplFileObject =
            $this->createGenericUseCaseDetailResponseAssemblerImplFileObject($entityFileObject);
        $genericUseCaseDetailResponseFileObject = $this->createGenericUseCaseDetailResponseFileObject(
            $entityFileObject
        );
        $genericUseCaseDetailResponseDTOFileObject = $this->createGenericUseCaseDetailResponseDTOFileObject(
            $entityFileObject
        );
        $genericUseCaseTraitFileObject = $this->createGenericUseCaseTrait($entityFileObject);

        $entityFileObject->setMethods(MethodUtility::getSelectedMethods($entityClassName, $fields));

        $genericUseCaseDetailResponseAssemblerImplFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $genericUseCaseDetailResponseAssemblerFileObject,
                $genericUseCaseDetailResponseAssemblerImplFileObject,
                $genericUseCaseDetailResponseDTOFileObject,
                $genericUseCaseDetailResponseFileObject,
                $genericUseCaseTraitFileObject
            )
        );

        return $genericUseCaseDetailResponseAssemblerImplFileObject;
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

    private function createGenericUseCaseDetailResponseAssemblerFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGenericUseCaseDetailResponseAssemblerImplFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGenericUseCaseDetailResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function createGenericUseCaseDetailResponseDTOFileObject(FileObject $entityFileObject): FileObject
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
        FileObject $genericUseCaseDetailResponseAssemblerFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerImplFileObject,
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $genericUseCaseDetailResponseAssemblerFileObject,
            $genericUseCaseDetailResponseAssemblerImplFileObject,
            $genericUseCaseDetailResponseDTOFileObject,
            $genericUseCaseDetailResponseFileObject,
            $genericUseCaseTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerFileObject,
        FileObject $genericUseCaseDetailResponseAssemblerImplFileObject,
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): GenericUseCaseDetailResponseAssemblerImplSkeletonModel
    {
        return $this->genericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler->create(
            $entityFileObject,
            $genericUseCaseDetailResponseAssemblerFileObject,
            $genericUseCaseDetailResponseAssemblerImplFileObject,
            $genericUseCaseDetailResponseDTOFileObject,
            $genericUseCaseDetailResponseFileObject,
            $genericUseCaseTraitFileObject
        );
    }

    public function setGenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler(
        GenericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler $genericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler = $genericUseCaseDetailResponseAssemblerImplSkeletonModelAssembler;
    }
}
