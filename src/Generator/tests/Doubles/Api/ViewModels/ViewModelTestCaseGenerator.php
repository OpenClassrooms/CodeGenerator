<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelTestCaseSkeletonModelAssembler
     */
    private $viewModelTestCaseSkeletonModelAssembler;

    /**
     * @param ViewModelTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelFileObject = $this->createViewModelObject($generatorRequest->getUseCaseResponseClassName());
        $viewModelTestCaseFileObject = $this->buildTestCaseFileObject($viewModelFileObject);
        $viewModelTestCaseFileObject->setContent(
            $this->generateContent($viewModelTestCaseFileObject, $viewModelFileObject)
        );
        $this->insertFileObject($viewModelTestCaseFileObject);

        return $viewModelTestCaseFileObject;

    }

    protected function createViewModelObject(string $useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
    }

    public function buildTestCaseFileObject(FileObject $viewModelFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $viewModelFileObject->getDomain(),
            $viewModelFileObject->getEntity()
        );
        $viewModelTestCaseFileObject->setFields($this->getPublicClassFields($viewModelFileObject->getClassName()));

        return $viewModelTestCaseFileObject;

    }

    public function generateContent(FileObject $viewModelTestCaseFileObject, FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelTestCaseFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel
    {
        return $this->viewModelTestCaseSkeletonModelAssembler->create(
            $viewModelTestCaseFileObject,
            $viewModelFileObject
        );
    }

    public function setViewModelTestCaseSkeletonModelAssembler(
        ViewModelTestCaseSkeletonModelAssembler $viewModelTestCaseSkeletonModelAssembler
    ): void
    {
        $this->viewModelTestCaseSkeletonModelAssembler = $viewModelTestCaseSkeletonModelAssembler;
    }
}
