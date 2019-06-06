<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestSkeletonModelBuilder;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelListItemAssemblerImplTestGenerator extends AbstractViewModelGenerator
{
    /**
     * @var ViewModelListItemAssemblerImplTestSkeletonModelBuilder
     */
    private $viewModelTestSkeletonModelBuilder;

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

    private function buildViewModelListItemAssemblerImplTestFileObject(
        string $useCaseResponseClassName
    ): FileObject {
        $this->initFileObjectParameter($useCaseResponseClassName);

        $viewModelListItemAssemblerImpl = $this->createViewModelListItemAssemblerImplFileObject();
        $viewModelListItemTestCase = $this->createViewModelListItemTestCaseFileObject();
        $useCaseListItemResponseStub = $this->createUseCaseListItemResponseStubFileObject();
        $viewModelListItemStub = $this->createViewModelListItemStubFileObject();
        $viewModelListItemAssembler = $this->createViewModelListItemAssemblerFileObject();
        $viewModelListItemAssemblerImplTest = $this->createViewModelListItemAssemblerImplTestFileObject();

        $viewModelListItemAssemblerImplTest->setContent(
            $this->generateContent(
                [
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL               => $viewModelListItemAssemblerImpl,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE                    => $viewModelListItemTestCase,
                    UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB => $useCaseListItemResponseStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB                         => $viewModelListItemStub,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER                    => $viewModelListItemAssembler,
                    ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST          => $viewModelListItemAssemblerImplTest,
                ]
            )
        );

        return $viewModelListItemAssemblerImplTest;
    }

    /**
     * @param string $viewModelListItemAssemblerImplClassName
     *
     * @return FileObject
     */
    private function createViewModelListItemAssemblerImplFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL,
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

    private function createViewModelListItemAssemblerImplTestFileObject(): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST,
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
    private function createSkeletonModel(array $fileObjects): ViewModelListItemAssemblerImplTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelBuilder->create()
            ->withViewModelListItemAssemblerImpl(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL]
            )
            ->withViewModelListItemTestCase($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE])
            ->withUseCaseListItemResponseStub(
                $fileObjects[UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB]
            )
            ->withViewModelListItemStub($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB])
            ->withViewModelListItemAssembler($fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER])
            ->withViewModelListItemAssemblerImplTest(
                $fileObjects[ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST]
            )
            ->build();
    }

    public function setViewModelListItemAssemblerImplTestSkeletonModelBuilder(
        ViewModelListItemAssemblerImplTestSkeletonModelBuilder $assembler
    ) {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}
