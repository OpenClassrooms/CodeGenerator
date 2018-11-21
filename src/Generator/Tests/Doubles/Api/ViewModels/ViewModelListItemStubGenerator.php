<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
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

    private function buildStubFileObject(string $viewModelClassName): FileObject
    {
        $viewModelListItemFileObject = $this->buildViewModelListItemFileObject($viewModelClassName);

        $viewModelListItemStub = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $viewModelListItemFileObject->getDomain(),
            $viewModelListItemFileObject->getEntity()
        );
        $viewModelListItemStub->setFields($this->generateStubFields($viewModelListItemFileObject));

        return $viewModelListItemStub;
    }

    private function buildViewModelListItemFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM, $domain, $entity);
    }

    private function buildViewModelListItemImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_IMPL, $domain, $entity);
    }

    private function createSkeletonModel(
        FileObject $stubFileObject,
        FileObject $viewModelListItemImplFileObject
    ): ViewModelListItemStubSkeletonModel
    {
        return $this->viewModelStubListItemSkeletonModelAssembler->create(
            $stubFileObject,
            $viewModelListItemImplFileObject
        );
    }

    /**
     * @param ViewModelListItemStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelStubFileObject = $this->buildStubFileObject($generatorRequest->getClassName());
        $viewModelListItemImplFileObject = $this->buildViewModelListItemImplFileObject($generatorRequest->getClassName());
        $viewModelStubFileObject->setContent(
            $this->generateContent($viewModelStubFileObject, $viewModelListItemImplFileObject)
        );
        $this->insertFileObject($viewModelStubFileObject);

        return $viewModelStubFileObject;
    }

    private function generateContent(FileObject $stubFileObject, FileObject $viewModelListItemImplFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($stubFileObject, $viewModelListItemImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function generateStubFields(FileObject $viewModelListItemImplFileObject): array
    {
        $viewModelFields = $this->getParentAndChildPublicClassFields($viewModelListItemImplFileObject->getClassName());

        return $this->stubService->setNameAndStubValues($viewModelFields, $viewModelListItemImplFileObject);
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
