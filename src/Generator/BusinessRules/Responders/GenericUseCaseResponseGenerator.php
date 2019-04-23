<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseResponseSkeletonModelAssembler
     */
    private $genericUseCaseResponseSkeletonModelAssembler;

    /**
     * @param GenericUseCaseResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseResponseFileObject = $this->buildGenericUseCaseResponseFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseResponseFileObject);

        return $genericUseCaseResponseFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildGenericUseCaseResponseFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $genericUseCaseResponseFileObject = $this->createGenericUseCaseResponseFileObject($entityFileObject);

        $genericUseCaseResponseFileObject->setMethods(MethodUtility::getSelectedMethods($entityClassName, $fields));
        $genericUseCaseResponseFileObject->setContent($this->generateContent($genericUseCaseResponseFileObject));

        return $genericUseCaseResponseFileObject;
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
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(FileObject $genericUseCaseResponseFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($genericUseCaseResponseFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseResponseFileObject
    ): GenericUseCaseResponseSkeletonModel
    {
        return $this->genericUseCaseResponseSkeletonModelAssembler->create($genericUseCaseResponseFileObject);
    }

    public function setGenericUseCaseResponseSkeletonModelAssembler(
        GenericUseCaseResponseSkeletonModelAssembler $genericUseCaseResponseSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseResponseSkeletonModelAssembler = $genericUseCaseResponseSkeletonModelAssembler;
    }
}
