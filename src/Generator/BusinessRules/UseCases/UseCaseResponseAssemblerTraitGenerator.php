<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseAssemblerTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseAssemblerTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseAssemblerTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

class UseCaseResponseAssemblerTraitGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseAssemblerTraitSkeletonModelAssembler
     */
    private $useCaseResponseAssemblerTraitSkeletonModelAssembler;

    private function buildUseCaseResponseAssemblerTraitFileObject(
        string $entityClassName,
        array $wantedFields = []
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);

        $entityFileObject = $this->createEntityFileObject();
        $useCaseResponseCommonFieldTraitFileObject = $this->createUseCaseResponseCommonFieldTraitFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseResponseAssemblerTraitFileObject = $this->createUseCaseResponseAssemblerTraitFileObject();

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $entityFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));

        $useCaseResponseAssemblerTraitFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $useCaseResponseCommonFieldTraitFileObject,
                $useCaseResponseFileObject,
                $useCaseResponseAssemblerTraitFileObject
            )
        );

        return $useCaseResponseAssemblerTraitFileObject;
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

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): UseCaseResponseAssemblerTraitSkeletonModel {
        return $this->useCaseResponseAssemblerTraitSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseResponseCommonFieldTraitFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseAssemblerTraitFileObject
        );
    }

    private function createUseCaseResponseAssemblerTraitFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_ASSEMBLER_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseResponseCommonFieldTraitFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseResponseFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param UseCaseResponseAssemblerTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseAssemblerTraitFileObject = $this->buildUseCaseResponseAssemblerTraitFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseAssemblerTraitFileObject);

        return $useCaseResponseAssemblerTraitFileObject;
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseAssemblerTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $useCaseResponseCommonFieldTraitFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseAssemblerTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setUseCaseResponseAssemblerTraitSkeletonModelAssembler(
        UseCaseResponseAssemblerTraitSkeletonModelAssembler $useCaseResponseAssemblerTraitSkeletonModelAssembler
    ): void {
        $this->useCaseResponseAssemblerTraitSkeletonModelAssembler = $useCaseResponseAssemblerTraitSkeletonModelAssembler;
    }
}
