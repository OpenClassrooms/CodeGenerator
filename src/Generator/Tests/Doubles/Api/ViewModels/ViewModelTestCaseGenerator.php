<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
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
        $useCaseResponseFileObject = $this->createUseCaseResponseObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $viewModelTestCaseFileObject = $this->buildTestCaseFileObject($useCaseResponseFileObject);

        return $viewModelTestCaseFileObject;

    }

    protected function createUseCaseResponseObject(string $useCaseResponseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($useCaseResponseClassName);

        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_DTO,
            $domain,
            $entity
        );
    }

    public function buildTestCaseFileObject(FileObject $useCaseResponseFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject($useCaseResponseFileObject);
        $viewModelFileObject = $this->createViewModelObject($useCaseResponseFileObject);
        $viewModelTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseResponseFileObject->getClassName())
        );
        $viewModelTestCaseFileObject->setContent(
            $this->generateContent($viewModelTestCaseFileObject, $viewModelFileObject)
        );
        $this->insertFileObject($viewModelTestCaseFileObject);

        return $viewModelTestCaseFileObject;

    }

    private function createViewModelTestCaseFileObject(FileObject $useCaseResponseFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $useCaseResponseFileObject->getDomain(),
            $useCaseResponseFileObject->getEntity()
        );

        return $viewModelTestCaseFileObject;
    }

    private function createViewModelObject(FileObject $useCaseResponseFileObject): FileObject
    {
        $viewModelTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $useCaseResponseFileObject->getDomain(),
            $useCaseResponseFileObject->getEntity()
        );

        return $viewModelTestCaseFileObject;
    }

    public function generateContent(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): string
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
