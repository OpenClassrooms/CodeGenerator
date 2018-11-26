<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\StubService;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelListItemStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubGenerator extends AbstractViewModelGenerator
{
    /**
     * @var StubService
     */
    private $stubService;

    /**
     * @var ViewModelListItemStubSkeletonModelAssembler
     */
    private $viewModelStubListItemSkeletonModelAssembler;

    /**
     * @param ViewModelListItemStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemStubFileObject = $this->buildViewModelListItemStubFileObject(
            $generatorRequest->getClassName()
        );
        $viewModelListItemImplFileObject = $this->buildViewModelListItemImplFileObject(
            $generatorRequest->getClassName()
        );
        $useCaseListItemResponseStubFileObject = $this->buildUseCaseListItemResponseStubFileObject(
            $generatorRequest->getClassName()
        );
        $viewModelListItemStubFileObject->setContent(
            $this->generateContent(
                $viewModelListItemStubFileObject,
                $viewModelListItemImplFileObject,
                $useCaseListItemResponseStubFileObject
            )
        );
        $this->insertFileObject($viewModelListItemStubFileObject);

        return $viewModelListItemStubFileObject;
    }

    private function buildViewModelListItemStubFileObject(string $viewModelClassName): FileObject
    {
        $viewModelListItemFileObject = $this->buildViewModelListItemFileObject($viewModelClassName);

        $viewModelListItemStubFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity()
        );
        $viewModelListItemStubFileObject->setFields($this->generateStubFields($viewModelListItemFileObject));

        return $viewModelListItemStubFileObject;
    }

    private function buildViewModelListItemFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM, $domain, $entity);
    }

    private function generateStubFields(FileObject $viewModelListItemImplFileObject): array
    {
        $viewModelFields = $this->getParentAndChildPublicClassFields($viewModelListItemImplFileObject->getClassName());

        return $this->stubService->setNameAndStubValues($viewModelFields, $viewModelListItemImplFileObject);
    }

    private function buildViewModelListItemImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL,
            $domain,
            $entity
        );
    }

    private function buildUseCaseListItemResponseStubFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $domain,
            $entity
        );
    }

    private function generateContent(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): string
    {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelListItemStubFileObject,
            $viewModelListItemImplFileObject,
            $useCaseListItemResponseStubFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemStubFileObject,
        FileObject $viewModelListItemImplFileObject,
        FileObject $useCaseListItemResponseStubFileObject
    ): ViewModelListItemStubSkeletonModel
    {
        return $this->viewModelStubListItemSkeletonModelAssembler->create(
            $viewModelListItemStubFileObject,
            $viewModelListItemImplFileObject,
            $useCaseListItemResponseStubFileObject
        );
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setViewModelStubListItemSkeletonModelAssembler(
        ViewModelListItemStubSkeletonModelAssembler $viewModelStubListItemSkeletonModelAssembler
    ): void
    {
        $this->viewModelStubListItemSkeletonModelAssembler = $viewModelStubListItemSkeletonModelAssembler;
    }
}
