<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\FileObjects\Impl\EntityFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\UseCaseResponseFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\FileObjects\Impl\ViewModelFileObjectFactoryImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Services\Impl\FieldObjectServiceImpl;
use OpenClassrooms\CodeGenerator\Services\Impl\StubServiceImpl;
use OpenClassrooms\CodeGenerator\SkeletonModels\tests\BusinessRules\Responders\Impl\UseCaseListItemResponseStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityListItemResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\FixturesConfig;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var UseCaseListItemResponseStubGeneratorRequest
     */
    private $request;

    /**
     * @var UseCaseListItemResponseStubGenerator
     */
    private $useCaseListItemResponseStubGenerator;

    /**
     * @test
     */
    public function generate_ReturnFileObject()
    {
        $actualFileObject = $this->useCaseListItemResponseStubGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()],
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp()
    {
        $useCaseListItemResponseStubGeneratorRequestBuilder = new UseCaseListItemResponseStubGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseStubGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityListItemResponseDTO::class)
            ->build();

        $this->useCaseListItemResponseStubGenerator = new UseCaseListItemResponseStubGenerator();

        $this->useCaseListItemResponseStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseListItemResponseStubGenerator->setFieldObjectService(new FieldObjectServiceImpl());
        $this->useCaseListItemResponseStubGenerator->setTemplating(new TemplatingMock());

        $viewModelFileObjectFactory = new ViewModelFileObjectFactoryImpl();
        $viewModelFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);
        $viewModelFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);

        $useCaseResponseFileObjectFactory = new UseCaseResponseFileObjectFactoryImpl();
        $useCaseResponseFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $useCaseResponseFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);

        $entityStubFileObjectFactory = new EntityFileObjectFactoryImpl();
        $entityStubFileObjectFactory->setBaseNamespace(FixturesConfig::BASE_NAMESPACE);
        $entityStubFileObjectFactory->setStubNamespace(FixturesConfig::STUB_NAMESPACE);

        $this->useCaseListItemResponseStubGenerator->setViewModelFileObjectFactory($viewModelFileObjectFactory);
        $this->useCaseListItemResponseStubGenerator->setUseCaseResponseFileObjectFactory(
            $useCaseResponseFileObjectFactory
        );
        $this->useCaseListItemResponseStubGenerator->setEntityFileObjectFactory($entityStubFileObjectFactory);
        $this->useCaseListItemResponseStubGenerator->setUseCaseListItemResponseStubSkeletonModelAssembler(
            new UseCaseListItemResponseStubSkeletonModelAssemblerImpl()
        );
    }
}
