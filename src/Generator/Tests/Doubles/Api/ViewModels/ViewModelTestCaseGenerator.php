<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTestCase\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModelTestCase\ViewModelTestCaseSkeletonModelAssembler;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelTestCaseSkeletonModelAssembler
     */
    private $viewModelTestCaseSkeletonModelAssembler;

    public function buildTestCaseFileObject(string $viewModelClassName): array
    {
        $viewModelFileObject = $this->buildViewModelFileObject($viewModelClassName);

        $viewModelTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $viewModelFileObject->getDomain(),
            $viewModelFileObject->getEntity()
        );
        $viewModelTestCaseFileObject->setFields($this->getPublicClassFields($viewModelFileObject->getClassName()));

        return [$viewModelTestCaseFileObject, $viewModelFileObject];

    }

    /**
     * @param string $viewModelClassName
     */
    protected function buildViewModelFileObject(string $viewModelClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelClassName);

        return $this->createViewModelFileObject(ViewModelFileObjectType::API_VIEW_MODEL, $domain, $entity);
    }

    private function createSkeletonModel(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel
    {
        return $this->viewModelTestCaseSkeletonModelAssembler->create($viewModelTestCaseFileObject, $viewModelFileObject);
    }

    /**
     * @param ViewModelTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        [$viewModelTestCaseFileObject, $viewModelFileObject] = $this->buildTestCaseFileObject(
            $generatorRequest->getClassName()
        );
        $viewModelTestCaseFileObject->setContent(
            $this->generateContent($viewModelTestCaseFileObject, $viewModelFileObject)
        );
        $this->insertFileObject($viewModelTestCaseFileObject);

        return $viewModelTestCaseFileObject;

    }

    public function generateContent(FileObject $viewModelTestCaseFileObject, FileObject $viewModelFileObject): string
    {
        $skeletonModel = $this->createSkeletonModel($viewModelTestCaseFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setViewModelTestCaseSkeletonModelAssembler(
        ViewModelTestCaseSkeletonModelAssembler $viewModelTestCaseSkeletonModelAssembler
    ): void
    {
        $this->viewModelTestCaseSkeletonModelAssembler = $viewModelTestCaseSkeletonModelAssembler;
    }
}
