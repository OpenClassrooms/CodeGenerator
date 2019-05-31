<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseResponseSkeletonModelAssembler
     */
    private $useCaseResponseSkeletonModelAssembler;

    /**
     * @param UseCaseResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseResponseFileObject = $this->buildUseCaseResponseFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($useCaseResponseFileObject);

        return $useCaseResponseFileObject;
    }

    /**
     * @param string[] $wantedFields
     */
    private function buildUseCaseResponseFileObject(string $entityClassName, array $wantedFields = []): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject($entityFileObject);

        $fields = FieldUtility::getFields($entityClassName, $wantedFields);
        $useCaseResponseFileObject->setMethods($this->getSelectedAccessors($entityClassName, $fields));
        $useCaseResponseFileObject->setContent($this->generateContent($useCaseResponseFileObject));

        return $useCaseResponseFileObject;
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

    private function generateContent(FileObject $useCaseResponseFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($useCaseResponseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseResponseFileObject
    ): UseCaseResponseSkeletonModel
    {
        return $this->useCaseResponseSkeletonModelAssembler->create($useCaseResponseFileObject);
    }

    public function setUseCaseResponseSkeletonModelAssembler(
        UseCaseResponseSkeletonModelAssembler $useCaseResponseSkeletonModelAssembler
    ): void
    {
        $this->useCaseResponseSkeletonModelAssembler = $useCaseResponseSkeletonModelAssembler;
    }
}
