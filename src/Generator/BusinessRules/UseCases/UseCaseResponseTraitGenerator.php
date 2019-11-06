<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseTraitGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseTraitSkeletonModelAssembler
     */
    private $useCaseResponseTraitSkeletonModelAssembler;

    /**
     * @param UseCaseResponseTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseTraitFileObject = $this->buildUseCaseResponseTraitFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseTraitFileObject);

        return $useCaseResponseTraitFileObject;
    }

    private function buildUseCaseResponseTraitFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $this->initFileObjectParameter($entityClassName);

        $entityFileObject = $this->createEntityFileObject();
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject();
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseResponseTraitFileObject = $this->createUseCaseResponseTraitFileObject();

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $entityFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));

        $useCaseResponseTraitFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $useCaseResponseDTOFileObject,
                $useCaseResponseFileObject,
                $useCaseResponseTraitFileObject
            )
        );

        return $useCaseResponseTraitFileObject;
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

    private function createUseCaseResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
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

    private function createUseCaseResponseTraitFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $useCaseResponseDTOFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $useCaseResponseDTOFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $useCaseResponseDTOFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): UseCaseResponseTraitSkeletonModel {
        return $this->useCaseResponseTraitSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseResponseDTOFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTraitFileObject
        );
    }

    public function setUseCaseResponseTraitSkeletonModelAssembler(
        UseCaseResponseTraitSkeletonModelAssembler $useCaseResponseTraitSkeletonModelAssembler
    ): void {
        $this->useCaseResponseTraitSkeletonModelAssembler = $useCaseResponseTraitSkeletonModelAssembler;
    }
}
