<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseDetailResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseDetailResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseDetailResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseDetailResponseSkeletonModelAssembler
     */
    private $genericUseCaseDetailResponseSkeletonModelAssembler;

    /**
     * @param GenericUseCaseDetailResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseDetailResponseFileObject = $this->buildGenericUseCaseDetailResponseFileObject(
            $generatorRequest->getEntity(),
            $generatorRequest->getFields()
        );

        $this->insertFileObject($genericUseCaseDetailResponseFileObject);

        return $genericUseCaseDetailResponseFileObject;
    }

    /**
     * @param string[] $fields
     */
    private function buildGenericUseCaseDetailResponseFileObject(string $entityClassName, array $fields): FileObject
    {
        $entityFileObject = $this->createEntityFileObject($entityClassName);
        $genericUseCaseResponseFileObject = $this->createGenericUseCaseResponseFileObject($entityFileObject);
        $genericUseCaseDetailResponseFileObject = $this->createGenericUseCaseDetailResponseFileObject(
            $entityFileObject
        );

        $genericUseCaseDetailResponseFileObject->setMethods(
            MethodUtility::getSelectedAccessors($entityClassName, $fields)
        );
        $genericUseCaseDetailResponseFileObject->setContent(
            $this->generateContent($genericUseCaseResponseFileObject, $genericUseCaseDetailResponseFileObject)
        );

        return $genericUseCaseDetailResponseFileObject;
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

    private function createGenericUseCaseResponseFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function createGenericUseCaseDetailResponseFileObject(FileObject $entity): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $entity->getDomain(),
            $entity->getEntity()
        );
    }

    private function generateContent(
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseDetailResponseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseResponseFileObject,
            $genericUseCaseDetailResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseResponseFileObject,
        FileObject $genericUseCaseDetailResponseFileObject
    ): GenericUseCaseDetailResponseSkeletonModel
    {
        return $this->genericUseCaseDetailResponseSkeletonModelAssembler->create(
            $genericUseCaseResponseFileObject,
            $genericUseCaseDetailResponseFileObject
        );
    }

    public function setGenericUseCaseDetailResponseSkeletonModelAssembler(
        GenericUseCaseDetailResponseSkeletonModelAssembler $genericUseCaseDetailResponseSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseDetailResponseSkeletonModelAssembler = $genericUseCaseDetailResponseSkeletonModelAssembler;
    }
}
