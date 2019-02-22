<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelListItemTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemTestCaseGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\ViewModelListItemTestCaseSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemTestCase\ViewModelListItemTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemTestCaseGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelListItemTestCaseGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelListItemTestCaseGenerator
     */
    private $viewModelListItemTestCaseGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->viewModelListItemTestCaseGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemTestCaseFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $stub1GeneratorRequestBuilder = new ViewModelListItemTestCaseGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelListItemTestCaseGenerator = new ViewModelListItemTestCaseGenerator();

        $this->viewModelListItemTestCaseGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelListItemTestCaseGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->viewModelListItemTestCaseGenerator->setTemplating(new TemplatingServiceMock());

        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setApiDir(FixturesConfig::API_DIR);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);

        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setApiDir(FixturesConfig::API_DIR);
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);

        $this->viewModelListItemTestCaseGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->viewModelListItemTestCaseGenerator->setUseCaseResponseFileObjectFactory(
            $useCaseResponseFileObjectFactory
        );
        $this->viewModelListItemTestCaseGenerator->setViewModelListItemTestCaseSkeletonModelAssembler(
            new ViewModelListItemTestCaseSkeletonModelAssemblerImpl()
        );
    }
}
