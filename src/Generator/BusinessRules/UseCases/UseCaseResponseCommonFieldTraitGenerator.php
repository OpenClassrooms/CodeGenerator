<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseCommonFieldTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseCommonFieldTraitGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseCommonFieldTraitSkeletonModelAssembler
     */
    private $useCaseResponseCommonFieldTraitSkeletonModelAssembler;

    /**
     * @param UseCaseResponseCommonFieldTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseCommonFieldTraitFileObject = $this->buildUseCaseResponseCommonFieldTraitFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseCommonFieldTraitFileObject);

        return $useCaseResponseCommonFieldTraitFileObject;
    }

    private function buildUseCaseResponseCommonFieldTraitFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseResponseCommonFieldTraitFileObject = $this->createUseCaseResponseCommonFieldTraitFileObject();

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $useCaseResponseCommonFieldTraitFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $useCaseResponseCommonFieldTraitFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));
        $useCaseResponseCommonFieldTraitFileObject->setContent(
            $this->generateContent(
                $useCaseResponseFileObject,
                $useCaseResponseCommonFieldTraitFileObject
            )
        );

        return $useCaseResponseCommonFieldTraitFileObject;
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

    private function createUseCaseResponseCommonFieldTraitFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseResponseFileObject,
            $useCaseResponseCommonFieldTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseResponseCommonFieldTraitSkeletonModel {
        return $this->useCaseResponseCommonFieldTraitSkeletonModelAssembler->create(
            $useCaseResponseFileObject,
            $useCaseResponseCommonFieldTraitFileObject
        );
    }

    public function setUseCaseResponseCommonFieldTraitSkeletonModelAssembler(
        UseCaseResponseCommonFieldTraitSkeletonModelAssembler $useCaseResponseCommonFieldTraitSkeletonModelAssembler
    ): void {
        $this->useCaseResponseCommonFieldTraitSkeletonModelAssembler = $useCaseResponseCommonFieldTraitSkeletonModelAssembler;
    }
}
