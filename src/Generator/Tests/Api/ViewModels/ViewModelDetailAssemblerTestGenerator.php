<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerTestSkeletonModelBuilder;

final class ViewModelDetailAssemblerTestGenerator extends AbstractViewModelGenerator
{
    private ViewModelDetailAssemblerTestSkeletonModelBuilder $viewModelTestSkeletonModelBuilder;

    /**
     * @param ViewModelDetailAssemblerTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailAssemblerTest = $this->buildViewModelDetailAssemblerTestFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelDetailAssemblerTest);

        return $viewModelDetailAssemblerTest;
    }

    private function buildViewModelDetailAssemblerTestFileObject(
        string $useCaseResponseClassName
    ): FileObject {
        $this->initFileObjectParameter($useCaseResponseClassName);

        $viewModelDetailTestCase = $this->createViewModelDetailTestCaseFileObject();
        $useCaseDetailResponseStub = $this->createUseCaseDetailResponseStubFileObject();
        $viewModelDetailStub = $this->createViewModelDetailStubFileObject();
        $viewModelDetailAssembler = $this->createViewModelDetailAssemblerFileObject();
        $viewModelDetailAssemblerTest = $this->createViewModelDetailAssemblerTestFileObjectFileObject();

        $viewModelDetailAssemblerTest->setContent(
            $this->generateContent(
                [
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE                    => $viewModelDetailTestCase,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB => $useCaseDetailResponseStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB                         => $viewModelDetailStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER                    => $viewModelDetailAssembler,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_TEST               => $viewModelDetailAssemblerTest,
                ]
            )
        );

        return $viewModelDetailAssemblerTest;
    }

    private function createViewModelDetailTestCaseFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createUseCaseDetailResponseStubFileObject(): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailStubFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailAssemblerFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
    }

    private function createViewModelDetailAssemblerTestFileObjectFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_TEST,
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
    private function createSkeletonModel(array $fileObjects): ViewModelDetailAssemblerTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelBuilder->create()
            ->withViewModelDetailTestCase($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE])
            ->withUseCaseDetailResponseStub(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB]
            )
            ->withViewModelDetailStub($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB])
            ->withViewModelDetailAssembler($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER])
            ->withViewModelDetailAssemblerTest(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_TEST]
            )
            ->build();
    }

    public function setViewModelDetailAssemblerTestSkeletonModelBuilder(
        ViewModelDetailAssemblerTestSkeletonModelBuilder $assembler
    ): void {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}
