<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Entities\Type\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\Type\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestSkeletonModelBuilder;

class ViewModelDetailAssemblerImplTestGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelDetailAssemblerImplTestSkeletonModelBuilder
     */
    private $viewModelTestSkeletonModelBuilder;

    /**
     * @param ViewModelDetailAssemblerImplTestGeneratorRequest $generatorRequest
     */
    public function generate(GeneratorRequest $generatorRequest): FileObject
    {
        $viewModelDetailAssemblerImplTest = $this->buildViewModelDetailAssemblerImplTestFileObject(
            $generatorRequest->getUseCaseResponseClassName()
        );
        $this->insertFileObject($viewModelDetailAssemblerImplTest);

        return $viewModelDetailAssemblerImplTest;
    }

    private function buildViewModelDetailAssemblerImplTestFileObject(
        string $useCaseResponseClassName
    ): FileObject {
        $this->initFileObjectParameter($useCaseResponseClassName);

        $viewModelDetailAssemblerImpl = $this->createViewModelDetailAssemblerImplFileObject();
        $viewModelDetailTestCase = $this->createViewModelDetailTestCaseFileObject();
        $useCaseDetailResponseStub = $this->createUseCaseDetailResponseStubFileObject();
        $viewModelDetailStub = $this->createViewModelDetailStubFileObject();
        $viewModelDetailAssembler = $this->createViewModelDetailAssemblerFileObject();
        $viewModelDetailAssemblerImplTest = $this->createViewModelDetailAssemblerImplTestFileObjectFileObject();

        $viewModelDetailAssemblerImplTest->setContent(
            $this->generateContent(
                [
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL               => $viewModelDetailAssemblerImpl,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE                    => $viewModelDetailTestCase,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB => $useCaseDetailResponseStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB                         => $viewModelDetailStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER                    => $viewModelDetailAssembler,
                    ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST          => $viewModelDetailAssemblerImplTest,
                ]
            )
        );

        return $viewModelDetailAssemblerImplTest;
    }

    /**
     * @param string $viewModelDetailAssemblerImplClassName
     */
    private function createViewModelDetailAssemblerImplFileObject(): FileObject
    {
        return $viewModelDetailAssemblerImpl = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );
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
        $viewModelDetailAssembler = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $this->domain,
            $this->entity,
            $this->baseNamespace
        );

        return $viewModelDetailAssembler;
    }

    private function createViewModelDetailAssemblerImplTestFileObjectFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST,
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
    private function createSkeletonModel(array $fileObjects): ViewModelDetailAssemblerImplTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelBuilder->create()
            ->withViewModelDetailAssemblerImpl(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL]
            )
            ->withViewModelDetailTestCase($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE])
            ->withUseCaseDetailResponseStub(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB]
            )
            ->withViewModelDetailStub($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB])
            ->withViewModelDetailAssembler($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER])
            ->withViewModelDetailAssemblerImplTest(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST]
            )
            ->build();
    }

    public function setViewModelDetailAssemblerImplTestSkeletonModelBuilder(
        ViewModelDetailAssemblerImplTestSkeletonModelBuilder $assembler
    ) {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}
