<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerTestSkeletonModelBuilder;

class ViewModelListItemAssemblerImplTestGenerator extends AbstractViewModelGenerator
{
    private ViewModelListItemAssemblerTestSkeletonModelBuilder $viewModelTestSkeletonModelBuilder;

    /**
     * @param ViewModelListItemAssemblerImplTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelListItemAssemblerImplTest = $this->buildViewModelListItemAssemblerImplTestFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelListItemAssemblerImplTest);

        return $viewModelListItemAssemblerImplTest;
    }

    private function buildViewModelListItemAssemblerImplTestFileObject(string $useCaseResponseClassName): FileObject
    {
        $this->initFileObjectParameter($useCaseResponseClassName);

        $useCaseListItemResponseStub = $this->createUseCaseListItemResponseStubFileObject();
        $viewModelListItemStub = $this->createViewModelListItemStubFileObject();
        $viewModelListItemAssembler = $this->createViewModelListItemAssemblerFileObject();
        $viewModelListItemAssemblerTest = $this->createViewModelListItemAssemblerTestFileObject();

        $viewModelListItemAssemblerTest->setContent(
            $this->generateContent(
                [
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB => $useCaseListItemResponseStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB                         => $viewModelListItemStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER                    => $viewModelListItemAssembler,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_TEST               => $viewModelListItemAssemblerTest,
                ]
            )
        );

        return $viewModelListItemAssemblerTest;
    }

    private function createUseCaseListItemResponseStubFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemStubFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemAssemblerFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelListItemAssemblerTestFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_TEST,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    /**
     * @param FileObject[]
     */
    private function generateContent(array $fileObjects): string
    {
        $skeletonModel = $this->createSkeletonModel($fileObjects);

        return $this->render($skeletonModel->getTemplatePath(), ['skeletonModel' => $skeletonModel]);
    }

    /**
     * @param FileObject[]
     */
    private function createSkeletonModel(array $fileObjects): ViewModelListItemAssemblerTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelBuilder->create()
            ->withUseCaseListItemResponseStub(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB]
            )
            ->withViewModelListItemStub($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB])
            ->withViewModelListItemAssembler($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER])
            ->withViewModelListItemAssemblerTest(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_TEST]
            )
            ->build();
    }

    public function setViewModelListItemAssemblerImplTestSkeletonModelBuilder(
        ViewModelListItemAssemblerTestSkeletonModelBuilder $assembler
    ) {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}
