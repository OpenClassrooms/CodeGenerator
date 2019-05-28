<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\Request\UseCaseResponseTraitGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseTraitSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\UseCases\UseCaseResponseTraitSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

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
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseTraitFileObject);

        return $useCaseResponseTraitFileObject;
    }

    private function buildUseCaseResponseTraitFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $useCaseResponseDTOFileObject = $this->createUseCaseResponseDTOFileObject($entityFileObject);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject($entityFileObject);
        $useCaseResponseTraitFileObject = $this->createUseCaseResponseTraitFileObject($entityFileObject);

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

    private function createUseCaseResponseDTOFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity(),
            $entityFileObject->getBaseNamespace()
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

    private function createUseCaseResponseTraitFileObject(FileObject $entityFileObject): FileObject
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
        FileObject $useCaseResponseDTOFileObject,
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseResponseTraitFileObject
    ): string
    {
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
    ): UseCaseResponseTraitSkeletonModel
    {
        return $this->useCaseResponseTraitSkeletonModelAssembler->create(
            $entityFileObject,
            $useCaseResponseDTOFileObject,
            $useCaseResponseFileObject,
            $useCaseResponseTraitFileObject
        );
    }

    public function setUseCaseResponseTraitSkeletonModelAssembler(
        UseCaseResponseTraitSkeletonModelAssembler $useCaseResponseTraitSkeletonModelAssembler
    ): void
    {
        $this->useCaseResponseTraitSkeletonModelAssembler = $useCaseResponseTraitSkeletonModelAssembler;
    }
}
