<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Services\StubService;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelStubSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelStubSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelStubGenerator extends AbstractViewModelGenerator
{
    /**
     * @var StubService
     */
    private $stubService;

    /**
     * @var ViewModelStubSkeletonModelAssembler
     */
    private $viewModelStubDetailSkeletonModelAssembler;

    private function buildStubFileObject(string $viewModelClassName): FileObject
    {
        $viewModelFileObject = $this->buildViewModelFileObject($viewModelClassName);

        $viewModelStub = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_STUB,
            $viewModelFileObject->getDomain(),
            $viewModelFileObject->getEntity()
        );
        $viewModelStub->setFields($this->generateStubFields($viewModelFileObject));

        return $viewModelStub;
    }

    private function buildViewModelFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
    }

    private function buildViewModelImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_IMPL, $domain, $entity);
    }

    private function createSkeletonModel(
        FileObject $stubFileObject,
        FileObject $viewModelImplFileObject
    ): ViewModelStubSkeletonModel
    {
        return $this->viewModelStubDetailSkeletonModelAssembler->create(
            $stubFileObject,
            $viewModelImplFileObject
        );
    }

    /**
     * @param ViewModelStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelStubFileObject = $this->buildStubFileObject($generatorRequest->getClassName());
        $viewModelImplFileObject = $this->buildViewModelImplFileObject($generatorRequest->getClassName());
        $viewModelStubFileObject->setContent(
            $this->generateContent($viewModelStubFileObject, $viewModelImplFileObject)
        );
        $this->insertFileObject($viewModelStubFileObject);

        return $viewModelStubFileObject;
    }

    private function generateContent(FileObject $stubFileObject, FileObject $viewModelImplFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($stubFileObject, $viewModelImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function generateStubFields(FileObject $viewModelFileObject): array
    {
        $viewModelFields = $this->getPublicClassFields($viewModelFileObject->getClassName());

        return $this->stubService->setNameAndStubValues($viewModelFields, $viewModelFileObject);
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setViewModelStubDetailSkeletonModelAssembler(
        ViewModelStubSkeletonModelAssembler $viewModelStubDetailSkeletonModelAssembler
    ): void
    {
        $this->viewModelStubDetailSkeletonModelAssembler = $viewModelStubDetailSkeletonModelAssembler;
    }
}
