<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseDetailResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseDetailResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseDetailResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseDetailResponseSkeletonModelAssembler
     */
    private $useCaseDetailResponseSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseFileObject = $this->buildUseCaseDetailResponseFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseDetailResponseFileObject);

        return $useCaseDetailResponseFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildUseCaseDetailResponseFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject($entityFileObject);
        $useCaseDetailResponseFileObject = $this->createUseCaseDetailResponseFileObject(
            $entityFileObject
        );

        $useCaseDetailResponseFileObject->setMethods(
            $this->getSelectedAccessors($entityClassName, $fields)
        );
        $useCaseDetailResponseFileObject->setContent(
            $this->generateContent($useCaseResponseFileObject, $useCaseDetailResponseFileObject)
        );

        return $useCaseDetailResponseFileObject;
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
            $entityFileObject->getEntity()
        );
    }

    private function createUseCaseDetailResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseDetailResponseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseResponseFileObject,
            $useCaseDetailResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject,
        FileObject $useCaseDetailResponseFileObject
    ): UseCaseDetailResponseSkeletonModel
    {
        return $this->useCaseDetailResponseSkeletonModelAssembler->create(
            $useCaseResponseFileObject,
            $useCaseDetailResponseFileObject
        );
    }

    public function setUseCaseDetailResponseSkeletonModelAssembler(
        UseCaseDetailResponseSkeletonModelAssembler $useCaseDetailResponseSkeletonModelAssembler
    ): void
    {
        $this->useCaseDetailResponseSkeletonModelAssembler = $useCaseDetailResponseSkeletonModelAssembler;
    }
}
