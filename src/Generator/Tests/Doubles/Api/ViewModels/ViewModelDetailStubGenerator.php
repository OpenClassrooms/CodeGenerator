<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelDetailStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\StubService;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelDetailStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailStubGenerator extends AbstractViewModelGenerator
{
    /**
     * @var StubService
     */
    private $stubService;

    /**
     * @var ViewModelDetailStubSkeletonModelAssembler
     */
    private $viewModelDetailStubSkeletonModelAssembler;

    /**
     * @param ViewModelDetailStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailStubFileObject = $this->buildViewModelDetailStubFileObject($generatorRequest->getClassName());
        $viewModelDetailImplFileObject = $this->buildViewModelDetailImplFileObject($generatorRequest->getClassName());
        $useCaseDetailResponseStubFileObject = $this->buildUseCaseDetailResponseStubFileObject(
            $generatorRequest->getClassName()
        );
        $viewModelDetailStubFileObject->setContent(
            $this->generateContent(
                $viewModelDetailStubFileObject,
                $viewModelDetailImplFileObject,
                $useCaseDetailResponseStubFileObject
            )
        );
        $this->insertFileObject($viewModelDetailStubFileObject);

        return $viewModelDetailStubFileObject;
    }

    private function buildViewModelDetailStubFileObject(string $viewModelClassName): FileObject
    {
        $viewModelDetailFileObject = $this->buildViewModelDetailFileObject($viewModelClassName);

        $viewModelDetailStubFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
        $viewModelDetailStubFileObject->setFields($this->generateStubFields($viewModelDetailFileObject));

        return $viewModelDetailStubFileObject;
    }

    private function buildViewModelDetailFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL, $domain, $entity);
    }

    private function generateStubFields(FileObject $viewModelDetailFileObject): array
    {
        $viewModelFields = $this->getParentAndChildPublicClassFields($viewModelDetailFileObject->getClassName());

        return $this->stubService->setNameAndStubValues($viewModelFields, $viewModelDetailFileObject);
    }

    private function buildViewModelDetailImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL, $domain, $entity);
    }

    private function buildUseCaseDetailResponseStubFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $domain,
            $entity
        );
    }

    private function generateContent(
        FileObject $viewModelDetailStubFileObject,
        FileObject $viewModelDetailImplFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelDetailStubFileObject,
            $viewModelDetailImplFileObject,
            $useCaseDetailResponseStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $stubFileObject,
        FileObject $viewModelDetailImplFileObject,
        FileObject $useCaseDetailResponseStubFileObject
    ): ViewModelDetailStubSkeletonModel
    {
        return $this->viewModelDetailStubSkeletonModelAssembler->create(
            $stubFileObject,
            $viewModelDetailImplFileObject,
            $useCaseDetailResponseStubFileObject
        );
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setViewModelDetailStubSkeletonModelAssembler(
        ViewModelDetailStubSkeletonModelAssembler $viewModelDetailStubSkeletonModelAssembler
    ): void
    {
        $this->viewModelDetailStubSkeletonModelAssembler = $viewModelDetailStubSkeletonModelAssembler;
    }
}
