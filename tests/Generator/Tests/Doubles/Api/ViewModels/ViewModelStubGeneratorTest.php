<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelStubGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\StubServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\Doubles\Api\ViewModels\Impl\ViewModelStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelStub\ViewModelStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelStubGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelStubGenerator
     */
    private $viewModelStub1Generator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelStub1Generator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $stub1GeneratorRequestBuilder = new ViewModelStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntity::class)
            ->build();

        $this->viewModelStub1Generator = new ViewModelStubGenerator();

        $this->viewModelStub1Generator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelStub1Generator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelStub1Generator->setTemplating(new TemplatingMock());

        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $this->viewModelStub1Generator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelStub1Generator->setViewModelStubDetailSkeletonModelAssembler(
            new ViewModelStubSkeletonModelAssemblerImpl()
        );
        $this->viewModelStub1Generator->setStubService(new StubServiceImpl());
    }
}
