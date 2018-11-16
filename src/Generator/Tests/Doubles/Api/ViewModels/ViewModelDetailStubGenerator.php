<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
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
    private $viewModelStubDetailSkeletonModelAssembler;

    private function buildStubFileObject(string $viewModelClassName): FileObject
    {
        $viewModelDetailFileObject = $this->buildViewModelDetailFileObject($viewModelClassName);

        $viewModelDetailStub = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $viewModelDetailFileObject->getDomain(),
            $viewModelDetailFileObject->getEntity()
        );
        $viewModelDetailStub->setFields($this->generateStubFields($viewModelDetailFileObject));

        return $viewModelDetailStub;
    }

    private function buildViewModelDetailFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL, $domain, $entity);
    }

    private function buildViewModelDetailImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_IMPL, $domain, $entity);
    }

    private function createSkeletonModel(
        FileObject $stubFileObject,
        FileObject $viewModelDetailImplFileObject
    ): ViewModelDetailStubSkeletonModel
    {
        return $this->viewModelStubDetailSkeletonModelAssembler->create(
            $stubFileObject,
            $viewModelDetailImplFileObject
        );
    }

    /**
     * @param ViewModelDetailStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelStubFileObject = $this->buildStubFileObject($generatorRequest->getClassName());
        $viewModelDetailImplFileObject = $this->buildViewModelDetailImplFileObject($generatorRequest->getClassName());
        $viewModelStubFileObject->setContent(
            $this->generateContent($viewModelStubFileObject, $viewModelDetailImplFileObject)
        );
        $this->insertFileObject($viewModelStubFileObject);

        return $viewModelStubFileObject;
    }

    private function generateContent(FileObject $stubFileObject, FileObject $viewModelDetailImplFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($stubFileObject, $viewModelDetailImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function generateStubFields(FileObject $viewModelDetailImplFileObject): array
    {
        $viewModelFields = $this->getParentAndChildPublicClassFields($viewModelDetailImplFileObject->getClassName());

        return $this->stubService->setNameAndStubValues($viewModelFields, $viewModelDetailImplFileObject);
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setViewModelStubDetailSkeletonModelAssembler(
        ViewModelDetailStubSkeletonModelAssembler $viewModelStubDetailSkeletonModelAssembler
    ): void
    {
        $this->viewModelStubDetailSkeletonModelAssembler = $viewModelStubDetailSkeletonModelAssembler;
    }
}
