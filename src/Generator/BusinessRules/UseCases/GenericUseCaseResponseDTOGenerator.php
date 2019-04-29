<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseDTOGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseDTOSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseDTOSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseDTOGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseResponseDTOSkeletonModelAssembler
     */
    private $genericUseCaseResponseDTOSkeletonModelAssembler;

    /**
     * @param GenericUseCaseResponseDTOGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseResponseDTOFileObject = $this->buildGenericUseCaseResponseDTOFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseResponseDTOFileObject);

        return $genericUseCaseResponseDTOFileObject;
    }

    private function buildGenericUseCaseResponseDTOFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $genericUseCaseResponseFileObject = $this->createGenericUseCaseResponseFileObject($entityFileObject);
        $genericUseCaseResponseDTOFileObject = $this->createGenericUseCaseResponseDTOFileObject($entityFileObject);

        $genericUseCaseResponseDTOFileObject->setFields($this->getSelectedFields($entityClassName, $fields));
        $genericUseCaseResponseDTOFileObject->setMethods(MethodUtility::getSelectedAccessors($entityClassName, $fields));
        $genericUseCaseResponseDTOFileObject->setContent(
            $this->generateContent(
                $genericUseCaseResponseFileObject,
                $genericUseCaseResponseDTOFileObject
            )
        );

        return $genericUseCaseResponseDTOFileObject;
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

    private function createGenericUseCaseResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function createGenericUseCaseResponseDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseResponseFileObject,
            $genericUseCaseResponseDTOFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseResponseDTOFileObject
    ): GenericUseCaseResponseDTOSkeletonModel
    {
        return $this->genericUseCaseResponseDTOSkeletonModelAssembler->create(
            $genericUseCaseResponseFileObject,
            $genericUseCaseResponseDTOFileObject
        );
    }

    public function setGenericUseCaseResponseDTOSkeletonModelAssembler(
        GenericUseCaseResponseDTOSkeletonModelAssembler $genericUseCaseResponseDTOSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseResponseDTOSkeletonModelAssembler = $genericUseCaseResponseDTOSkeletonModelAssembler;
    }
}
