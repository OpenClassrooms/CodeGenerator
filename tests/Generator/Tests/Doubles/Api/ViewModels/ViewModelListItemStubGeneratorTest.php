<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Entities\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Entities\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelListItemStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemStubGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\ViewModelListItemStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemStub\ViewModelListItemStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelListItemStubGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelListItemStubGenerator
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
        $this->assertFileObject(new ViewModelListItemStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $stub1GeneratorRequestBuilder = new ViewModelListItemStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelStub1Generator = new ViewModelListItemStubGenerator();

        $this->viewModelStub1Generator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelStub1Generator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelStub1Generator->setTemplating(new TemplatingServiceMock());

        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setApiDir(FixturesConfig::API_DIR);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $this->viewModelStub1Generator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelStub1Generator->setUseCaseResponseFileObjectFactory($useCaseResponseFileObjectFactory);
        $this->viewModelStub1Generator->setViewModelStubListItemSkeletonModelAssembler(
            new ViewModelListItemStubSkeletonModelAssemblerImpl()
        );
    }
}
