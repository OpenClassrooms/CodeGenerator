<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseDetailResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseDetailResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseDetailResponseDTOSkeletonModelAssembler
     */
    private $genericUseCaseDetailResponseDTOSkeletonModelAssembler;

    /**
     * @param GenericUseCaseDetailResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseDetailResponseDTOFileObject = $this->buildGenericUseCaseDetailResponseDTOFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseDetailResponseDTOFileObject);

        return $genericUseCaseDetailResponseDTOFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildGenericUseCaseDetailResponseDTOFileObject(string $entityClassName, array $fields): FileObject
    {
        $genericUseCaseDetailResponseDTOFileObject = $this->createGenericUseCaseDetailResponseDTOFileObject(
            $entityClassName
        );
        $genericUseCaseDetailResponseFileObject = $this->createGenericUseCaseDetailResponseFileObject(
            $genericUseCaseDetailResponseDTOFileObject
        );
        $genericUseCaseResponseDTOFileObject = $this->createGenericUseCaseResponseDTOFileObject(
            $genericUseCaseDetailResponseDTOFileObject
        );

        $genericUseCaseDetailResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $genericUseCaseDetailResponseDTOFileObject->setMethods(
            MethodUtility::getSelectedMethods($entityClassName, $fields)
        );

        $genericUseCaseDetailResponseDTOFileObject->setContent(
            $this->generateContent(
                $genericUseCaseDetailResponseDTOFileObject,
                $genericUseCaseDetailResponseFileObject,
                $genericUseCaseResponseDTOFileObject
            )
        );

        return $genericUseCaseDetailResponseDTOFileObject;
    }

    private function createGenericUseCaseDetailResponseDTOFileObject(
        string $entityClassName
    ): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_DTO,
            $domain,
            $entity,
            $baseNamespace
        );
    }

    public function createGenericUseCaseDetailResponseFileObject(FileObject $genericUseCaseDetailResponseDTOFileObject)
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $genericUseCaseDetailResponseDTOFileObject->getDomain(),
            $genericUseCaseDetailResponseDTOFileObject->getEntity()
        );
    }

    public function createGenericUseCaseResponseDTOFileObject(FileObject $genericUseCaseDetailResponseDTOFileObject)
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $genericUseCaseDetailResponseDTOFileObject->getDomain(),
            $genericUseCaseDetailResponseDTOFileObject->getEntity()
        );
    }

    /**
     * @param string[] $fields
     *
     * @return FieldObject[]
     */
    private function getSelectedFields(string $entityClassName, array $fields): array
    {
        $fieldObjects = $this->getProtectedClassFields($entityClassName);
        foreach ($fieldObjects as $key => $fieldObject) {
            if (!in_array($fieldObject->getName(), $fields)) {
                unset($fieldObjects[$key]);
            }
        }

        return $fieldObjects;
    }

    private function generateContent(
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseDetailResponseDTOFileObject,
            $genericUseCaseDetailResponseFileObject,
            $genericUseCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseDetailResponseDTOFileObject,
        FileObject $genericUseCaseDetailResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseDetailResponseDTOSkeletonModel
    {
        return $this->genericUseCaseDetailResponseDTOSkeletonModelAssembler->create(
            $genericUseCaseDetailResponseDTOFileObject,
            $genericUseCaseDetailResponseFileObject,
            $genericUseCaseResponseDTOFileObject
        );
    }

    public function setGenericUseCaseDetailResponseDTOSkeletonModelAssembler(
        GenericUseCaseDetailResponseDTOSkeletonModelAssembler $genericUseCaseDetailResponseDTOSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseDetailResponseDTOSkeletonModelAssembler = $genericUseCaseDetailResponseDTOSkeletonModelAssembler;
    }
}
