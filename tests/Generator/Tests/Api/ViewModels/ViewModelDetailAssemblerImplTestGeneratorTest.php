<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerImplTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTestGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Api\ViewModel\Impl\ViewModelDetailAssemblerImplTestSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\tests\Api\ViewModels\ViewModelDetailAssemblerImplTest\ViewModelDetailAssemblerImplTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityDetailAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelDetailAssemblerImplTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailAssemblerImplTestGeneratorRequest
     */
    private $request;

    /**
     * @var ViewModelDetailAssemblerImplTestGenerator
     */
    private $viewModelDetailAssemblerImplTestGenerator;

    /**
     * @test
     */
    public function generate()
    {
        $actualFileObject = $this->viewModelDetailAssemblerImplTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerImplTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl(
        );
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityDetailAssemblerImpl::class)
            ->build();

        $this->viewModelDetailAssemblerImplTestGenerator = new ViewModelDetailAssemblerImplTestGenerator();
        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $viewModelFileObjectFactory->setTestsBaseNamespace(FixturesConfig::TEST_BASE_NAMESPACE);
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $this->viewModelDetailAssemblerImplTestGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelDetailAssemblerImplTestGenerator->setUseCaseResponseFileObjectFactory(
            $useCaseResponseFileObjectFactory
        );
        $this->viewModelDetailAssemblerImplTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelDetailAssemblerImplTestGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelDetailAssemblerImplTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelDetailAssemblerImplTestGenerator->setViewModelDetailAssemblerImplTestSkeletonModelBuilder(
            new ViewModelDetailAssemblerImplTestSkeletonModelBuilderImpl()
        );
    }
}
