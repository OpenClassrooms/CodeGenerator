<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseDTOFileObject);

        return $useCaseResponseDTOFileObject;
    }

    private function buildUseCaseResponseDTOFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject($entityFileObject);
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject($entityFileObject);

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

    private function createUseCaseResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createUseCaseResponseDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseResponseFileObject,
            $useCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseDTOFileObject
    ): UseCaseResponseDTOSkeletonModel
    {
        return $this->useCaseResponseDTOSkeletonModelAssembler->create(
            $useCaseResponseFileObject,
            $useCaseResponseDTOFileObject
        );
    }

    public function setUseCaseResponseDTOSkeletonModelAssembler(
        UseCaseResponseDTOSkeletonModelAssembler $useCaseResponseDTOSkeletonModelAssembler
    ): void
    {
        $this->useCaseResponseDTOSkeletonModelAssembler = $useCaseResponseDTOSkeletonModelAssembler;
    }
}
