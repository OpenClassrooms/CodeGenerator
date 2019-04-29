<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\GenericUseCaseResponseTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\GenericUseCaseResponseTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseTraitGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseResponseTraitSkeletonModelAssembler
     */
    private $genericUseCaseResponseTraitSkeletonModelAssembler;

    /**
     * @param GenericUseCaseResponseTraitGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseResponseTraitFileObject = $this->buildGenericUseCaseResponseTraitFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseResponseTraitFileObject);

        return $genericUseCaseResponseTraitFileObject;
    }

    private function buildGenericUseCaseResponseTraitFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $genericUseCaseResponseDTOFileObject = $this->createGenericUseCaseResponseDTOFileObject($entityFileObject);
        $genericUseCaseResponseFileObject = $this->createGenericUseCaseResponseFileObject($entityFileObject);
        $genericUseCaseResponseTraitFileObject = $this->createGenericUseCaseResponseTraitFileObject($entityFileObject);

        $entityFileObject->setMethods(MethodUtility::getSelectedAccessors($entityClassName, $fields));

        $genericUseCaseResponseTraitFileObject->setContent(
            $this->generateContent(
                $entityFileObject,
                $genericUseCaseResponseDTOFileObject,
                $genericUseCaseResponseFileObject,
                $genericUseCaseResponseTraitFileObject
            )
        );

        return $genericUseCaseResponseTraitFileObject;
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

    private function createGenericUseCaseResponseDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
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

    private function createGenericUseCaseResponseTraitFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_TRAIT,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
        );
    }

    private function generateContent(
        FileObject $entityFileObject,
        FileObject $genericUseCaseResponseDTOFileObject,
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $entityFileObject,
            $genericUseCaseResponseDTOFileObject,
            $genericUseCaseResponseFileObject,
            $genericUseCaseResponseTraitFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $entityFileObject,
        FileObject $genericUseCaseResponseDTOFileObject,
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseResponseTraitFileObject
    ): GenericUseCaseResponseTraitSkeletonModel
    {
        return $this->genericUseCaseResponseTraitSkeletonModelAssembler->create(
            $entityFileObject,
            $genericUseCaseResponseDTOFileObject,
            $genericUseCaseResponseFileObject,
            $genericUseCaseResponseTraitFileObject
        );
    }

    public function setGenericUseCaseResponseTraitSkeletonModelAssembler(
        GenericUseCaseResponseTraitSkeletonModelAssembler $genericUseCaseResponseTraitSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseResponseTraitSkeletonModelAssembler = $genericUseCaseResponseTraitSkeletonModelAssembler;
    }
}
