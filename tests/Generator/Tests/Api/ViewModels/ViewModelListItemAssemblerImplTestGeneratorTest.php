<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelListItemAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelListItemAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\Impl\ViewModelListItemAssemblerImplTestSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\tests\Api\ViewModels\ViewModelListItemAssemblerImplTest\ViewModelListItemAssemblerImplTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityListItemAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelListItemAssemblerImplTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelListItemAssemblerImplTestGeneratorRequest
     */
    private $request;

    /**
     * @var ViewModelListItemAssemblerImplTestGenerator
     */
    private $viewModelListItemAssemblerImplTestGenerator;

    /**
     * @test
     */
    public function generate()
    {
        $actualFileObject = $this->viewModelListItemAssemblerImplTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemAssemblerImplTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelListItemAssemblerImplTestGeneratorRequestBuilderImpl(
        );
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityListItemAssemblerImpl::class)
            ->build();

        $this->viewModelListItemAssemblerImplTestGenerator = new ViewModelListItemAssemblerImplTestGenerator();
        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
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
        $this->viewModelListItemAssemblerImplTestGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelListItemAssemblerImplTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelListItemAssemblerImplTestGenerator->setViewModelListItemAssemblerImplTestSkeletonModelBuilder(
            new ViewModelListItemAssemblerImplTestSkeletonModelBuilderImpl()
        );
    }
}