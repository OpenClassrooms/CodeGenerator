<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Entities\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\Entities\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\FileObjectUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
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
    ): FileObject
    {
        $viewModelDetailAssemblerImpl = $this->createViewModelDetailAssemblerImplFileObject(
            $useCaseResponseClassName
        );
        $viewModelDetailTestCase = $this->createViewModelDetailTestCase($viewModelDetailAssemblerImpl);
        $useCaseDetailResponseStub = $this->createUseCaseDetailResponseStub($viewModelDetailAssemblerImpl);
        $viewModelDetailStub = $this->createViewModelDetailStub($viewModelDetailAssemblerImpl);
        $viewModelDetailAssembler = $this->createViewModelDetailAssembler($viewModelDetailAssemblerImpl);
        $viewModelDetailAssemblerImplTest = $this->createViewModelDetailAssemblerImplTestFileObject(
            $useCaseResponseClassName
        );

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
     *
     * @return FileObject
     */
    private function createViewModelDetailAssemblerImplFileObject(
        string $viewModelDetailAssemblerImplClassName
    ): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName(
            $viewModelDetailAssemblerImplClassName
        );

        $viewModelDetailAssemblerImpl = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
            $domain,
            $entity,
            $baseNamespace
        );

        return $viewModelDetailAssemblerImpl;
    }

    private function createViewModelDetailTestCase(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        $viewModelDetailTestCase = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity(),
            $viewModelDetailAssemblerImpl->getBaseNamespace()
        );

        return $viewModelDetailTestCase;
    }

    private function createUseCaseDetailResponseStub(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity(),
            $viewModelDetailAssemblerImpl->getBaseNamespace()
        );
    }

    private function createViewModelDetailStub(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity(),
            $viewModelDetailAssemblerImpl->getBaseNamespace()
        );
    }

    private function createViewModelDetailAssembler(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        $viewModelDetailAssembler = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity(),
            $viewModelDetailAssemblerImpl->getBaseNamespace()
        );

        return $viewModelDetailAssembler;
    }

    private function createViewModelDetailAssemblerImplTestFileObject(string $responseClassName): FileObject
    {
        [$baseNamespace, $domain, $entity] = FileObjectUtility::getBaseNamespaceDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this
            ->createViewModelFileObject(
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST,
                $domain,
                $entity,
                $baseNamespace
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
    )
    {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}
