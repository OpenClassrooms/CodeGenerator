<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseSkeletonModelAssembler;

class ViewModelListItemTestCaseGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemTestCaseSkeletonModelAssembler
     */
    private $viewModelListItemTestCaseSkeletonModelAssembler;

    /**
     * @param ViewModelListItemTestCaseGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->buildListItemTestCaseFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );

        $this->insertFileObject($viewModelListItemTestCaseFileObject);

        return $viewModelListItemTestCaseFileObject;
    }

    public function buildListItemTestCaseFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);
        $useCaseListItemResponseDTOFileObject = $this->createUseCaseListItemResponseDTOFileObject();
        $viewModelListItemTestCaseFileObject = $this->createViewModelListItemTestCaseFileObject();
        $viewModelTestCaseFileObject = $this->createViewModelTestCaseFileObject();
        $viewModelListItemFileObject = $this->createViewModelListItemFileObject();

        $viewModelListItemTestCaseFileObject->setFields(
            $this->getPublicClassFields($useCaseListItemResponseDTOFileObject->getClassName())
        );

        $viewModelListItemTestCaseFileObject->setContent(
            $this->generateContent(
                $viewModelListItemTestCaseFileObject,
                $viewModelTestCaseFileObject,
                $viewModelListItemFileObject
            )
        );

        return $viewModelListItemTestCaseFileObject;
    }

    private function createUseCaseListItemResponseDTOFileObject()
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_DTO,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemTestCaseFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
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

    private function createViewModelListItemFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    public function generateContent(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): string {
        $skeletonModel = $this->createSkeletonModel(
            $viewModelListItemTestCaseFileObject,
            $viewModelTestCaseFileObject,
            $viewModelListItemFileObject
        );

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    private function createSkeletonModel(
        FileObject $viewModelListItemTestCaseFileObject,
        FileObject $viewModelTestCaseFileObject,
        FileObject $viewModelListItemFileObject
    ): ViewModelListItemTestCaseSkeletonModel {
        return $this->viewModelListItemTestCaseSkeletonModelAssembler->create(
            $viewModelListItemTestCaseFileObject,
            $viewModelTestCaseFileObject,
            $viewModelListItemFileObject
        );
    }

    public function setViewModelListItemTestCaseSkeletonModelAssembler(
        ViewModelListItemTestCaseSkeletonModelAssembler $viewModelListItemTestCaseSkeletonModelAssembler
    ) {
        $this->viewModelListItemTestCaseSkeletonModelAssembler = $viewModelListItemTestCaseSkeletonModelAssembler;
    }
}
