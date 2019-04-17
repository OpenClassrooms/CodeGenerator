<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\GenericUseCaseListItemResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\GenericUseCaseListItemResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class GenericUseCaseListItemResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var GenericUseCaseListItemResponseSkeletonModelAssembler
     */
    private $genericUseCaseListItemResponseSkeletonModelAssembler;

    /**
     * @param GenericUseCaseListItemResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $genericUseCaseListItemResponseFileObject = $this->buildGenericUseCaseListItemResponseFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($genericUseCaseListItemResponseFileObject);

        return $genericUseCaseListItemResponseFileObject;
    }

    private function buildGenericUseCaseListItemResponseFileObject(string $entityClassName): FileObject
    {
        $genericUseCaseListItemResponseFileObject = $this->createGenericUseCaseListItemResponseFileObject(
            $entityClassName
        );
        $genericUseCaseResponseFileObject = $this->createGenericUseCaseResponseFileObject(
            $genericUseCaseListItemResponseFileObject
        );

        $genericUseCaseListItemResponseFileObject->setContent(
            $this->generateContent($genericUseCaseListItemResponseFileObject, $genericUseCaseResponseFileObject)
        );

        return $genericUseCaseListItemResponseFileObject;
    }

    private function createGenericUseCaseListItemResponseFileObject(string $entityClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $entityClassName
        );

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
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

    private function generateContent(
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $genericUseCaseListItemResponseFileObject,
            $genericUseCaseResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $genericUseCaseListItemResponseFileObject,
        FileObject $genericUseCaseResponseFileObject
    ): GenericUseCaseListItemResponseSkeletonModel
    {
        return $this->genericUseCaseListItemResponseSkeletonModelAssembler->create(
            $genericUseCaseListItemResponseFileObject,
            $genericUseCaseResponseFileObject
        );
    }

    public function setGenericUseCaseListItemResponseSkeletonModelAssembler(
        GenericUseCaseListItemResponseSkeletonModelAssembler $genericUseCaseListItemResponseSkeletonModelAssembler
    ): void
    {
        $this->genericUseCaseListItemResponseSkeletonModelAssembler = $genericUseCaseListItemResponseSkeletonModelAssembler;
    }
}
