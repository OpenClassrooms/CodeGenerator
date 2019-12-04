<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelTestCaseSkeletonModelAssembler;

class ViewModelTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelTestCaseSkeletonModelAssembler
     */
    private $viewModelTestCaseSkeletonModelAssembler;

    public function buildTestCaseFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseResponseCommonFieldTraitFileObject = $this->createUseCaseResponseCommonFieldTraitFileObject();
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject();
        $viewModelFileObject = $this->createViewModelObject();
        $viewModelTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseResponseCommonFieldTraitFileObject->getClassName())
        );
        $viewModelTestCaseFileObject->setContent(
            $this->generateContent($viewModelTestCaseFileObject, $viewModelFileObject)
        );
        $this->insertFileObject($viewModelTestCaseFileObject);

        return $viewModelTestCaseFileObject;
    }

    private function createSkeletonModel(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): ViewModelTestCaseSkeletonModel {
        return $this->viewModelTestCaseSkeletonModelAssembler->create(
            $viewModelTestCaseFileObject,
            $viewModelFileObject
        );
    }

    protected function createUseCaseResponseCommonFieldTraitFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_RESPONSE_COMMON_FIELD_TRAIT,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelTestCaseFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_TEST_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param ViewModelTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelTestCaseFileObject = $this->buildTestCaseFileObject($generatorRequest->getUseCaseResponseClassName());

        return $viewModelTestCaseFileObject;
    }

    public function generateContent(
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel($viewModelTestCaseFileObject, $viewModelFileObject);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    public function setViewModelTestCaseSkeletonModelAssembler(
        ViewModelTestCaseSkeletonModelAssembler $viewModelTestCaseSkeletonModelAssembler
    ): void {
        $this->viewModelTestCaseSkeletonModelAssembler = $viewModelTestCaseSkeletonModelAssembler;
    }
}
