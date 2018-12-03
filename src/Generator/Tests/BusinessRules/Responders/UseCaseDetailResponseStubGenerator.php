<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\EntityFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\UseCaseDetailResponseStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubGenerator extends AbstractUseCaseResponseStubGenerator
{
    /**
     * @var UseCaseDetailResponseStubSkeletonModelAssembler
     */
    private $useCaseDetailResponseStubSkeletonModelAssembler;

    /**
     * @param UseCaseDetailResponseStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $useCaseDetailResponseFileObject = $this->BuildUseCaseDetailResponseFileObject(
            $generatorRequest->getResponseClassName()
        );
        $useCaseDetailResponseStubFileObject = $this->buildUseCaseDetailResponseStubFileObject(
            $useCaseDetailResponseFileObject
        );
        $viewModelDetailStubFileObject = $this->buildViewModelDetailStubFileObject($useCaseDetailResponseFileObject);

        $entityStubFileObject = $this->buildEntityStubFileObject($useCaseDetailResponseFileObject);

        $useCaseDetailResponseStubFileObject->setContent(
            $this->generateContent(
                $useCaseDetailResponseStubFileObject,
                $useCaseDetailResponseFileObject,
                $viewModelDetailStubFileObject,
                $entityStubFileObject
            )
        );

        $this->insertFileObject($useCaseDetailResponseStubFileObject);

        return $useCaseDetailResponseStubFileObject;
    }

    private function BuildUseCaseDetailResponseFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);

        return $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE,
            $domain,
            $entity
        );
    }

    private function buildUseCaseDetailResponseStubFileObject(FileObject $useCaseDetailResponseFileObject)
    {
        $useCaseDetailResponseStubFileObject = $this->useCaseResponseFileObjectFactory->create(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );

        $useCaseDetailResponseStubFileObject->setFields($this->generateStubFields($useCaseDetailResponseFileObject));

        return $useCaseDetailResponseStubFileObject;
    }

    private function generateStubFields(FileObject $useCaseDetailResponseFileObject): array
    {
        $useCaseDetailResponseFields = $this->getParentAndChildPublicClassFields(
            $useCaseDetailResponseFileObject->getClassName()
        );

        return $this->stubService->setNameAndStubValues($useCaseDetailResponseFields, $useCaseDetailResponseFileObject);
    }

    private function buildViewModelDetailStubFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        return $this->viewModelFileObjectFactory->create(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );

    }

    private function buildEntityStubFileObject(FileObject $useCaseDetailResponseFileObject): FileObject
    {
        $useCaseDetailResponseFileObject = $this->entityFileObjectFactory->create(
            EntityFileObjectType::BUSINESS_RULES_ENTITY_STUB,
            $useCaseDetailResponseFileObject->getDomain(),
            $useCaseDetailResponseFileObject->getEntity()
        );

        return $useCaseDetailResponseFileObject;
    }

    private function generateContent(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailStubFileObject,
        FileObject $entityStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseFileObject,
            $viewModelDetailStubFileObject,
            $entityStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $useCaseDetailResponseStubFileObject,
        FileObject $useCaseDetailResponseFileObject,
        FileObject $viewModelDetailStubFileObject,
        FileObject $entityStubFileObject
    ): UseCaseDetailResponseStubSkeletonModel
    {
        return $this->useCaseDetailResponseStubSkeletonModelAssembler->create(
            $useCaseDetailResponseStubFileObject,
            $useCaseDetailResponseFileObject,
            $viewModelDetailStubFileObject,
            $entityStubFileObject
        );
    }

    public function setUseCaseDetailResponseStubSkeletonModelAssembler(
        UseCaseDetailResponseStubSkeletonModelAssembler $useCaseDetailResponseStubSkeletonModelAssembler
    ): void
    {
        $this->useCaseDetailResponseStubSkeletonModelAssembler = $useCaseDetailResponseStubSkeletonModelAssembler;
    }
}
