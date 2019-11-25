<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseDetailResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseDetailResponseDTOSkeletonModelAssembler;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseDTOSkeletonModelAssembler
     */
    private $useCaseDetailResponseDTOSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseDTOFileObject = $this->buildUseCaseDetailResponseDTOFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseDetailResponseDTOFileObject);

        return $useCaseDetailResponseDTOFileObject;
    }

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseDetailResponseDTOFileObject(
        string $entityClassName,
        array $wantedFields = []
    ): FileObject {
        $this->initFileObjectParameter($entityClassName);

        $useCaseDetailResponseDTOFileObject = $this->createUseCaseDetailResponseDTOFileObject();
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject();
        $useCaseResponseCommonFieldTraitFileObject = $this->createUseCaseResponseCommonFieldTraitFileObject();

        $useCaseDetailResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $wantedFields));
        $useCaseDetailResponseDTOFileObject->setMethods(
            $this->getSelectedAccessors($entityClassName, $wantedFields)
        );

        $useCaseDetailResponseDTOFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseDTOFileObject,
                $useCaseDetailResponseFileObject,
                $useCaseResponseCommonFieldTraitFileObject
            )
        );

        return $useCaseDetailResponseDTOFileObject;
    }

    private function createUseCaseDetailResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    public function createUseCaseDetailResponseFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
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
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseResponseCommonFieldTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseCommonFieldTraitFileObject
    ): UseCaseDetailResponseDTOSkeletonModel {
        return $this->useCaseDetailResponseDTOSkeletonModelAssembler->create(
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseResponseCommonFieldTraitFileObject
        );
    }

    public function setUseCaseDetailResponseDTOSkeletonModelAssembler(
        UseCaseDetailResponseDTOSkeletonModelAssembler $useCaseDetailResponseDTOSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseDTOSkeletonModelAssembler = $useCaseDetailResponseDTOSkeletonModelAssembler;
    }
}
