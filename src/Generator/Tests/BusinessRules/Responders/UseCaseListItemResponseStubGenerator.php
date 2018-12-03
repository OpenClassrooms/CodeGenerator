<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseListItemResponseStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubGenerator extends AbstractUseCaseResponseStubGenerator
{
    /**
     * @var UseCaseListItemResponseStubSkeletonModelAssembler
     */
    private $useCaseListItemResponseStubSkeletonModelAssembler;

    /**
     * @param UseCaseListItemResponseStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseListItemResponseFileObject = $this->BuildUseCaseListItemResponseFileObject(
            $generatorRequest->getResponseClassName()
        );
        $useCaseListItemResponseStubFileObject = $this->buildUseCaseListItemResponseStubFileObject(
            $useCaseListItemResponseFileObject
        );
        $viewModelListItemStubFileObject = $this->buildViewModelListItemStubFileObject(
            $useCaseListItemResponseFileObject
        );

        $entityStubFileObject = $this->buildEntityStubFileObject($useCaseListItemResponseFileObject);

        $useCaseListItemResponseStubFileObject->setContent(
            $this->generateContent(
                $useCaseListItemResponseStubFileObject,
                $useCaseListItemResponseFileObject,
                $viewModelListItemStubFileObject,
                $entityStubFileObject
            )
        );

        $this->insertFileObject($useCaseListItemResponseStubFileObject);

        return $useCaseListItemResponseStubFileObject;
    }

    private function BuildUseCaseListItemResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE,
            $domain,
            $entity
        );
    }

    private function buildUseCaseListItemResponseStubFileObject(FileObject $useCaseListItemResponseFileObject)
    {
        $useCaseListItemResponseStubFileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );

        $useCaseListItemResponseStubFileObject->setFields(
            $this->generateStubFields($useCaseListItemResponseFileObject)
        );

        return $useCaseListItemResponseStubFileObject;
    }

    private function generateStubFields(FileObject $useCaseListItemResponseFileObject): array
    {
        $useCaseListItemResponseFields = $this->getParentAndChildPublicClassFields(
            $useCaseListItemResponseFileObject->getClassName()
        );

        return $this->stubService->setNameAndStubValues(
            $useCaseListItemResponseFields,
            $useCaseListItemResponseFileObject
        );
    }

    private function buildViewModelListItemStubFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );

    }

    private function buildEntityStubFileObject(FileObject $useCaseListItemResponseFileObject): FileObject
    {
        $useCaseListItemResponseFileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $useCaseListItemResponseFileObject->getDomain(),
            $useCaseListItemResponseFileObject->getEntity()
        );

        return $useCaseListItemResponseFileObject;
    }

    private function generateContent(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemStubFileObject,
        FileObject $entityStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseFileObject,
            $viewModelListItemStubFileObject,
            $entityStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseListItemResponseStubFileObject,
        FileObject $useCaseListItemResponseFileObject,
        FileObject $viewModelListItemStubFileObject,
        FileObject $entityStubFileObject
    ): UseCaseListItemResponseStubSkeletonModel
    {
        return $this->useCaseListItemResponseStubSkeletonModelAssembler->create(
            $useCaseListItemResponseStubFileObject,
            $useCaseListItemResponseFileObject,
            $viewModelListItemStubFileObject,
            $entityStubFileObject
        );
    }

    public function setUseCaseListItemResponseStubSkeletonModelAssembler(
        UseCaseListItemResponseStubSkeletonModelAssembler $useCaseListItemResponseStubSkeletonModelAssembler
    ): void
    {
        $this->useCaseListItemResponseStubSkeletonModelAssembler = $useCaseListItemResponseStubSkeletonModelAssembler;
    }
}
