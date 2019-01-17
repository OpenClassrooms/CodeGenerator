<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\UseCaseResponseFileObjectType;
use OpenClassrooms\CodeGenerator\FileObjects\ViewModelFileObjectType;
use OpenClassrooms\CodeGenerator\Generator\Api\AbstractViewModelGenerator;
use OpenClassrooms\CodeGenerator\Generator\GeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\ViewModelDetailAssemblerImplTestSkeletonModel;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\ViewModelDetailAssemblerImplTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Utility\MethodUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ViewModelDetailAssemblerImplTestGenerator extends AbstractViewModelGenerator
{
    const USE_CASE_DETAIL_RESPONSE_STUB = 'useCaseDetailResponseStub';

    const VIEW_MODEL_DETAIL_ASSEMBLER = 'viewModelDetailAssembler';

    const VIEW_MODEL_DETAIL_ASSEMBLER_IMPL = 'viewModelDetailAssemblerImpl';

    const VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST = 'viewModelDetailAssemblerImplTest';

    const VIEW_MODEL_DETAIL_STUB = 'viewModelDetailStub';

    const VIEW_MODEL_DETAIL_TEST_CASE = 'viewModelDetailTestCase';

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
            $generatorRequest->getViewModelDetailAssemblerImplClassName()
        );
        $this->insertFileObject($viewModelDetailAssemblerImplTest);

        return $viewModelDetailAssemblerImplTest;
    }

    private function buildViewModelDetailAssemblerImplTestFileObject(
        string $viewModelDetailAssemblerImplClassName
    ): FileObject
    {
        $viewModelDetailAssemblerImpl = $this->createViewModelDetailAssemblerImplFileObject(
            $viewModelDetailAssemblerImplClassName
        );
        $viewModelDetailTestCase = $this->createViewModelDetailTestCase($viewModelDetailAssemblerImpl);
        $useCaseDetailResponseStub = $this->createUseCaseDetailResponseStub($viewModelDetailAssemblerImpl);
        $viewModelDetailStub = $this->createViewModelDetailStub($viewModelDetailAssemblerImpl);
        $viewModelDetailAssembler = $this->createViewModelDetailAssembler($viewModelDetailAssemblerImpl);
        $viewModelDetailAssemblerImplTest = $this->createViewModelDetailAssemblerImplTestFileObject(
            $viewModelDetailAssemblerImplClassName
        );

        $viewModelDetailAssemblerImplTest->setContent(
            $this->generateContent(
                [
                    self::VIEW_MODEL_DETAIL_ASSEMBLER_IMPL      => $viewModelDetailAssemblerImpl,
                    self::VIEW_MODEL_DETAIL_TEST_CASE           => $viewModelDetailTestCase,
                    self::USE_CASE_DETAIL_RESPONSE_STUB         => $useCaseDetailResponseStub,
                    self::VIEW_MODEL_DETAIL_STUB                => $viewModelDetailStub,
                    self::VIEW_MODEL_DETAIL_ASSEMBLER           => $viewModelDetailAssembler,
                    self::VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST => $viewModelDetailAssemblerImplTest,
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
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($viewModelDetailAssemblerImplClassName);

        $viewModelDetailAssemblerImpl = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL,
            $domain,
            $entity
        );

        return $viewModelDetailAssemblerImpl;
    }

    private function createViewModelDetailTestCase(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        $viewModelDetailTestCase = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_TEST_CASE,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity()
        );

        $viewModelDetailTestCase->setMethods(MethodUtility::getAssertMethods($viewModelDetailTestCase->getClassName()));

        return $viewModelDetailTestCase;
    }

    private function createUseCaseDetailResponseStub(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        return $this->createUseCaseResponseFileObject(
            UseCaseResponseFileObjectType::BUSINESS_RULES_USE_CASE_DETAIL_RESPONSE_STUB,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity()
        );
    }

    private function createViewModelDetailStub(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        return $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_STUB,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity()
        );
    }

    private function createViewModelDetailAssembler(FileObject $viewModelDetailAssemblerImpl): FileObject
    {
        $viewModelDetailAssembler = $this->createViewModelFileObject(
            ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER,
            $viewModelDetailAssemblerImpl->getDomain(),
            $viewModelDetailAssemblerImpl->getEntity()
        );

        return $viewModelDetailAssembler;
    }

    private function createViewModelDetailAssemblerImplTestFileObject(string $responseClassName): FileObject
    {
        [$domain, $entity] = $this->getDomainAndEntityNameFromClassName($responseClassName);
        $responseFileObject = $this
            ->createViewModelFileObject(
                ViewModelFileObjectType::API_VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST,
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
    private function createSkeletonModel(array $fileObjects): ViewModelDetailAssemblerImplTestSkeletonModel
    {
        return $this->viewModelTestSkeletonModelBuilder->create()
            ->withViewModelDetailAssemblerImpl($fileObjects[self::VIEW_MODEL_DETAIL_ASSEMBLER_IMPL])
            ->withViewModelDetailTestCase($fileObjects[self::VIEW_MODEL_DETAIL_TEST_CASE])
            ->withUseCaseDetailResponseStub($fileObjects[self::USE_CASE_DETAIL_RESPONSE_STUB])
            ->withViewModelDetailStub($fileObjects[self::VIEW_MODEL_DETAIL_STUB])
            ->withViewModelDetailAssembler($fileObjects[self::VIEW_MODEL_DETAIL_ASSEMBLER])
            ->withViewModelDetailAssemblerImplTest($fileObjects[self::VIEW_MODEL_DETAIL_ASSEMBLER_IMPL_TEST])
            ->build();
    }

    public function setViewModelDetailAssemblerImplTestSkeletonModelBuilder(
        ViewModelDetailAssemblerImplTestSkeletonModelBuilder $assembler
    )
    {
        $this->viewModelTestSkeletonModelBuilder = $assembler;
    }
}