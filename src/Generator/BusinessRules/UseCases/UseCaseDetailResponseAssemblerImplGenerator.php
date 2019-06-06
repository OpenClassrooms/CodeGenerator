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
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);
        $entityFileObject = $this->createEntityFileObject();
        $useCaseDetailResponseAssemblerFileObject = $this->createUseCaseDetailResponseAssemblerFileObject();
        $useCaseDetailResponseAssemblerImplFileObject =
            $this->createUseCaseDetailResponseAssemblerImplFileObject();
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
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

    private function createEntityFileObject(): FileObject
    {
        return $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseAssemblerFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseAssemblerImplFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $this->domain,
            $this->entity
        );
    }

    private function createUseCaseDetailResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function createGenericUseCaseTrait(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseDetailResponseAssemblerFileObject,
        FileObject $useCaseDetailResponseAssemblerImplFileObject,
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $genericUseCaseTraitFileObject
    ): string {
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
    ): UseCaseDetailResponseAssemblerImplSkeletonModel {
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
    ): void {
        $this->useCaseDetailResponseAssemblerImplSkeletonModelAssembler = $useCaseDetailResponseAssemblerImplSkeletonModelAssembler;
    }
}
