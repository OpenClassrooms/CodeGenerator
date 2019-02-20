<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\EntityFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl\UseCaseDetailResponseStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Responders\UseCaseDetailResponseStub\UseCaseDetailResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseDetailResponseStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseDetailResponseStubGeneratorRequest
     */
    private $request;

    /**
     * @var UseCaseDetailResponseStubGenerator
     */
    private $useCaseDetailResponseStubGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->useCaseDetailResponseStubGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $useCaseDetailResponseStubGeneratorRequestBuilder = new UseCaseDetailResponseStubGeneratorRequestBuilderImpl();
        $this->request = $useCaseDetailResponseStubGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityResponse::class)
            ->build();

        $this->useCaseDetailResponseStubGenerator = new UseCaseDetailResponseStubGenerator();

        $this->useCaseDetailResponseStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseDetailResponseStubGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->useCaseDetailResponseStubGenerator->setTemplating(new TemplatingServiceMock());

        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);

        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);

        $entityStubFileObjectFactory = new EntityFileObjectFactoryImpl();
        $entityStubFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $entityStubFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);

        $this->useCaseDetailResponseStubGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->useCaseDetailResponseStubGenerator->setUseCaseResponseFileObjectFactory(
            $useCaseResponseFileObjectFactory
        );
        $this->useCaseDetailResponseStubGenerator->setEntityFileObjectFactory($entityStubFileObjectFactory);
        $this->useCaseDetailResponseStubGenerator->setUseCaseDetailResponseStubSkeletonModelAssembler(
            new UseCaseDetailResponseStubSkeletonModelAssemblerImpl()
        );
    }
}
