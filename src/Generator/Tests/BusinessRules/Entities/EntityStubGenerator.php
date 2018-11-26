<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\ViewModelStubGeneratorRequest;
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
    private $viewModelStubSkeletonModelAssembler;

    /**
     * @param ViewModelStubGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelStubFileObject = $this->buildViewModelStubFileObject($generatorRequest->getClassName());
        $viewModelImplFileObject = $this->buildViewModelImplFileObject($generatorRequest->getClassName());
        $viewModelStubFileObject->setContent(
            $this->generateContent($viewModelStubFileObject, $viewModelImplFileObject)
        );
        $this->insertFileObject($viewModelStubFileObject);

        return $viewModelStubFileObject;
    }

    private function buildViewModelStubFileObject(string $viewModelClassName): FileObject
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

    private function generateStubFields(FileObject $viewModelFileObject): array
    {
        $viewModelFields = $this->getPublicClassFields($viewModelFileObject->getClassName());

        return $this->stubService->setNameAndStubValues($viewModelFields, $viewModelFileObject);
    }

    private function buildViewModelImplFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL_IMPL, $domain, $entity);
    }

    private function generateContent(FileObject $viewModelStubFileObject, FileObject $viewModelImplFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelStubFileObject, $viewModelImplFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelStubFileObject,
        FileObject $viewModelImplFileObject
    ): ViewModelStubSkeletonModel
    {
        return $this->viewModelStubSkeletonModelAssembler->create(
            $viewModelStubFileObject,
            $viewModelImplFileObject
        );
    }

    public function setStubService(StubService $stubService): void
    {
        $this->stubService = $stubService;
    }

    public function setViewModelStubSkeletonModelAssembler(
        ViewModelStubSkeletonModelAssembler $viewModelStubSkeletonModelAssembler
    ): void
    {
        $this->viewModelStubSkeletonModelAssembler = $viewModelStubSkeletonModelAssembler;
    }
}
