<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseDTOSkeletonModelAssembler
     */
    private $useCaseResponseDTOSkeletonModelAssembler;

    /**
     * @param UseCaseResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseDTOFileObject = $this->buildUseCaseResponseDTOFileObject(
            $generatorRequest->getEntityClassName(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseDTOFileObject);

        return $useCaseResponseDTOFileObject;
    }

    private function buildUseCaseResponseDTOFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $this->initFileObjectParameter($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject();
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject();

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $useCaseResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $useCaseResponseDTOFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));
        $useCaseResponseDTOFileObject->setContent(
            $this->generateContent(
                $useCaseResponseFileObject,
                $useCaseResponseDTOFileObject
            )
        );

        return $useCaseResponseDTOFileObject;
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

    private function createUseCaseResponseDTOFileObject(): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function generateContent(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseResponseFileObject,
            $useCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseResponseDTOSkeletonModel {
        return $this->useCaseResponseDTOSkeletonModelAssembler->create(
            $useCaseResponseFileObject,
            $useCaseResponseDTOFileObject
        );
    }

    public function setUseCaseResponseDTOSkeletonModelAssembler(
        UseCaseResponseDTOSkeletonModelAssembler $useCaseResponseDTOSkeletonModelAssembler
    ): void {
        $this->useCaseResponseDTOSkeletonModelAssembler = $useCaseResponseDTOSkeletonModelAssembler;
    }
}
