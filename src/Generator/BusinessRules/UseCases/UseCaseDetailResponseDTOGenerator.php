<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
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
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject();

        $useCaseDetailResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $wantedFields));
        $useCaseDetailResponseDTOFileObject->setMethods(
            $this->getSelectedAccessors($entityClassName, $wantedFields)
        );

        $useCaseDetailResponseDTOFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseDTOFileObject,
                $useCaseDetailResponseFileObject,
                $useCaseResponseDTOFileObject
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

    public function createUseCaseResponseDTOFileObject()
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $this->domain,
            $this->entity
        );
    }

    private function generateContent(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseDTOFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseDetailResponseDTOSkeletonModel {
        return $this->useCaseDetailResponseDTOSkeletonModelAssembler->create(
            $useCaseDetailResponseDTOFileObject,
            $useCaseDetailResponseFileObject,
            $useCaseResponseDTOFileObject
        );
    }

    public function setUseCaseDetailResponseDTOSkeletonModelAssembler(
        UseCaseDetailResponseDTOSkeletonModelAssembler $useCaseDetailResponseDTOSkeletonModelAssembler
    ): void {
        $this->useCaseDetailResponseDTOSkeletonModelAssembler = $useCaseDetailResponseDTOSkeletonModelAssembler;
    }
}
