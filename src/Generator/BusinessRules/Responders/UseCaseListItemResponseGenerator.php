<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\AbstractUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\Request\UseCaseListItemResponseGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\BusinessRules\Responders\UseCaseListItemResponseSkeletonModelAssembler;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class UseCaseListItemResponseGenerator extends AbstractUseCaseGenerator
{
    /**
     * @var UseCaseListItemResponseSkeletonModelAssembler
     */
    private $useCaseListItemResponseSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseFileObject = $this->buildUseCaseListItemResponseFileObject(
            $generatorRequest->getEntity()
        );

        $this->insertFileObject($useCaseListItemResponseFileObject);

        return $useCaseListItemResponseFileObject;
    }

    private function buildUseCaseListItemResponseFileObject(string $entityClassName): FileObject
    {
        $useCaseListItemResponseFileObject = $this->createUseCaseListItemResponseFileObject(
            $entityClassName
        );
        $useCaseResponseFileObject = $this->createUseCaseResponseFileObject(
            $useCaseListItemResponseFileObject
        );

        $useCaseListItemResponseFileObject->setContent(
            $this->generateContent($useCaseListItemResponseFileObject, $useCaseResponseFileObject)
        );

        return $useCaseListItemResponseFileObject;
    }

    private function createUseCaseListItemResponseFileObject(string $entityClassName): FileObject
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

    private function createUseCaseResponseFileObject(FileObject $entityFileObject): FileObject
    {
        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE,
            $entityFileObject->getDomain(),
            $entityFileObject->getEntity()
        );
    }

    private function generateContent(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseFileObject,
            $useCaseResponseFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseFileObject,
        FileObject $useCaseResponseFileObject
    ): UseCaseListItemResponseSkeletonModel
    {
        return $this->useCaseListItemResponseSkeletonModelAssembler->create(
            $useCaseListItemResponseFileObject,
            $useCaseResponseFileObject
        );
    }

    public function setUseCaseListItemResponseSkeletonModelAssembler(
        UseCaseListItemResponseSkeletonModelAssembler $useCaseListItemResponseSkeletonModelAssembler
    ): void
    {
        $this->useCaseListItemResponseSkeletonModelAssembler = $useCaseListItemResponseSkeletonModelAssembler;
    }
}
