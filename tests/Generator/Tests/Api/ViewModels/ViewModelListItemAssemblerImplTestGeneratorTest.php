<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Entities\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\Impl\ViewModelListItemAssemblerImplTestSkeletonModelBuilder;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelListItemAssemblerTest\ViewModelListItemAssemblerTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

class ViewModelListItemAssemblerImplTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private ViewModelListItemAssemblerImplTestGeneratorRequest $request;

    private ViewModelListItemAssemblerImplTestGenerator $viewModelListItemAssemblerImplTestGenerator;

    /**
     * @test
     */
    public function generate(): void
    {
        $actualFileObject = $this->viewModelListItemAssemblerImplTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemAssemblerTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl();
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelListItemAssemblerImplTestGenerator = new ViewModelListItemAssemblerImplTestGenerator();
        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setApiDir(FixturesConfig::API_DIR);
        $viewModelFileObjectFactory->setAppDir(FixturesConfig::APP_DIR);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $viewModelFileObjectFactory->setTestsBaseNamespace(FixturesConfig::TEST_BASE_NAMESPACE);
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $this->viewModelListItemAssemblerImplTestGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelListItemAssemblerImplTestGenerator->setUseCaseResponseFileObjectFactory(
            $useCaseResponseFileObjectFactory
        );
        $this->viewModelListItemAssemblerImplTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelListItemAssemblerImplTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelListItemAssemblerImplTestGenerator->setViewModelListItemAssemblerImplTestSkeletonModelBuilder(
            new ViewModelListItemAssemblerImplTestSkeletonModelBuilder()
        );
    }
}
