<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\ViewModelListItemAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\ViewModelListItemAssemblerImplTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelListItemAssemblerImplTestGenerator extends AbstractViewModelGenerator
{
    const USE_CASE_LIST_ITEM_RESPONSE_STUB = 'useCaseListItemResponseStub';

    const VIEW_MODEL_LIST_ITEM_ASSEMBLER = 'viewModelListItemAssembler';

    const VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL = 'viewModelListItemAssemblerImpl';

    const VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST = 'viewModelListItemAssemblerImplTest';

    const VIEW_MODEL_LIST_ITEM_STUB = 'viewModelListItemStub';

    const VIEW_MODEL_LIST_ITEM_TEST_CASE = 'viewModelListItemTestCase';

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
    ): FileObject
    {
        $viewModelListItemAssemblerImpl = $this->createViewModelListItemAssemblerImplFileObject(
            $useCaseResponseClassName
        );
        $viewModelListItemTestCase = $this->createViewModelListItemTestCase($viewModelListItemAssemblerImpl);
        $useCaseListItemResponseStub = $this->createUseCaseListItemResponseStub($viewModelListItemAssemblerImpl);
        $viewModelListItemStub = $this->createViewModelListItemStub($viewModelListItemAssemblerImpl);
        $viewModelListItemAssembler = $this->createViewModelListItemAssembler($viewModelListItemAssemblerImpl);
        $viewModelListItemAssemblerImplTest = $this->createViewModelListItemAssemblerImplTestFileObject(
            $useCaseResponseClassName
        );

        $viewModelListItemAssemblerImplTest->setContent(
            $this->generateContent(
                [
                    self::VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL      => $viewModelListItemAssemblerImpl,
                    self::VIEW_MODEL_LIST_ITEM_TEST_CASE           => $viewModelListItemTestCase,
                    self::USE_CASE_LIST_ITEM_RESPONSE_STUB         => $useCaseListItemResponseStub,
                    self::VIEW_MODEL_LIST_ITEM_STUB                => $viewModelListItemStub,
                    self::VIEW_MODEL_LIST_ITEM_ASSEMBLER           => $viewModelListItemAssembler,
                    self::VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST => $viewModelListItemAssemblerImplTest,
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
    private function createViewModelListItemAssemblerImplFileObject(
        string $viewModelListItemAssemblerImplClassName
    ): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelListItemAssemblerImplClassName);

        $viewModelListItemAssemblerImpl = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL,
            $domain,
            $entity
        );

        return $viewModelListItemAssemblerImpl;
    }

    private function createViewModelListItemTestCase(FileObject $viewModelListItemAssemblerImpl): FileObject
    {
        $viewModelListItemTestCaseFileObject = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_TEST_CASE,
            $viewModelListItemAssemblerImpl->getDomain(),
            $viewModelListItemAssemblerImpl->getEntity()
        );

        return $viewModelListItemTestCaseFileObject;
    }

    private function createUseCaseListItemResponseStub(FileObject $viewModelListItemAssemblerImpl): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_LIST_ITEM_RESPONSE_STUB,
            $viewModelListItemAssemblerImpl->getDomain(),
            $viewModelListItemAssemblerImpl->getEntity()
        );
    }

    private function createViewModelListItemStub(FileObject $viewModelListItemAssemblerImpl): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_STUB,
            $viewModelListItemAssemblerImpl->getDomain(),
            $viewModelListItemAssemblerImpl->getEntity()
        );
    }

    private function createViewModelListItemAssembler(FileObject $viewModelListItemAssemblerImpl): FileObject
    {
        $viewModelListItemAssembler = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER,
            $viewModelListItemAssemblerImpl->getDomain(),
            $viewModelListItemAssemblerImpl->getEntity()
        );

        return $viewModelListItemAssembler;
    }

    private function createViewModelListItemAssemblerImplTestFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this
            ->createViewModelFileObject(
                ViewModelFileObjectType::API_VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST,
                $domain,
                $entity
            );

        return $responseFileObject;
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
            ->withViewModelListItemAssemblerImpl($fileObjects[self::VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL])
            ->withViewModelListItemTestCase($fileObjects[self::VIEW_MODEL_LIST_ITEM_TEST_CASE])
            ->withUseCaseListItemResponseStub($fileObjects[self::USE_CASE_LIST_ITEM_RESPONSE_STUB])
            ->withViewModelListItemStub($fileObjects[self::VIEW_MODEL_LIST_ITEM_STUB])
            ->withViewModelListItemAssembler($fileObjects[self::VIEW_MODEL_LIST_ITEM_ASSEMBLER])
            ->withViewModelListItemAssemblerImplTest($fileObjects[self::VIEW_MODEL_LIST_ITEM_ASSEMBLER_IMPL_TEST])
            ->build();
    }

    public function setViewModelListItemAssemblerImplTestSkeletonModelBuilder(
        ViewModelListItemAssemblerImplTestSkeletonModelBuilder $assembler
    )
    {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}
