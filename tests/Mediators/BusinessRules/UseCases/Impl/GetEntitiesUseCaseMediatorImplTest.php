<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseAssemblerGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseListItemResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseListItemResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseListItemResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GetEntitiesUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseListItemResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseListItemResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseAssemblerMockFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseListItemResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Mediators\FlushedFileObjectTestCase;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class GetEntitiesUseCaseMediatorImplTest extends TestCase
{
    use CommonUseCaseGetGeneratorsMock;
    use FlushedFileObjectTestCase;

    /**
     * @var GetEntitiesUseCaseMediatorImpl
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

    /**
     * @test
     */
    public function generateGenericUseCase_withoutTest()
    {
        $this->options[Options::NO_TEST] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);
    }

    /**
     * @test
     */
    public function generateGenericUseCase_withTestOnly()
    {
        $this->options[Options::TESTS_ONLY] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options
        );

        $this->assertFlushedFileObject($fileObjects);

    }

    /**
     * @test
     */
    public function generateGenericUseCase_withDump()
    {
        $this->options[Options::DUMP] = null;
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options
        );

        $this->assertEmpty(InMemoryFileObjectGateway::$flushedFileObjects);
        $this->assertNotEmpty(InMemoryFileObjectGateway::$fileObjects);
        foreach ($fileObjects as $fileObject) {
            /** @var FileObject $fileObject */
            $this->assertArrayHasKey($fileObject->getClassName(), InMemoryFileObjectGateway::$fileObjects);
        }
    }

    /**
     * @test
     */
    public function generateGenericUseCase_withoutOptions()
    {
        $fileObjects = $this->mediator->mediate(
            [
                Args::CLASS_NAME => FunctionalEntity::class,
            ],
            $this->options

        );

        $this->assertFlushedFileObject($fileObjects);

    }

    protected function setUp()
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new GetEntitiesUseCaseMediatorImpl();
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());

        $this->options = [
            Options::DUMP       => false,
            Options::NO_TEST    => false,
            Options::TESTS_ONLY => false,
        ];

        $this->mockGenerators();
        $this->mockRequestBuilder();
    }

    private function mockGenerators(): void
    {
        $this->mockCommonGenerators();
        $this->mediator->setGetEntitiesUseCaseRequestBuilderImplGenerator(
            new GeneratorMock(
                GetEntitiesUseCaseRequestBuilderImplGenerator::class,
                new GetEntitiesUseCaseRequestBuilderImplFileObjectStub1()

            )
        );
        $this->mediator->setGetEntitiesUseCaseRequestDTOGenerator(
            new GeneratorMock(
                GetEntitiesUseCaseRequestDTOGenerator::class,
                new GetEntitiesUseCaseRequestDTOFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseListItemResponseAssemblerGenerator(
            new GeneratorMock(
                UseCaseListItemResponseAssemblerGenerator::class,
                new UseCaseListItemResponseAssemblerFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseListItemResponseGenerator(
            new GeneratorMock(UseCaseListItemResponseGenerator::class, new UseCaseListItemResponseFileObjectStub1())
        );
        $this->mediator->setGetEntitiesUseCaseGenerator(
            new GeneratorMock(GetEntitiesUseCaseGenerator::class, new GetEntitiesUseCaseFileObjectStub1())
        );
        $this->mediator->setUseCaseListItemResponseAssemblerImplGenerator(
            new GeneratorMock(
                UseCaseListItemResponseAssemblerImplGenerator::class,
                new UseCaseListItemResponseAssemblerImplFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseListItemResponseDTOGenerator(
            new GeneratorMock(
                UseCaseListItemResponseDTOGenerator::class,
                new UseCaseListItemResponseDTOFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseListItemResponseStubGenerator(
            new GeneratorMock(
                UseCaseListItemResponseStubGenerator::class,
                new UseCaseListItemResponseStubFileObjectStub1()
            )
        );
        $this->mediator->setGetEntitiesUseCaseTestGenerator(
            new GeneratorMock(GetEntitiesUseCaseTestGenerator::class, new GetEntitiesUseCaseTestFileObjectStub1())
        );
        $this->mediator->setUseCaseListItemResponseAssemblerMockGenerator(
            new GeneratorMock(
                UseCaseListItemResponseAssemblerMockGenerator::class,
                new UseCaseListItemResponseAssemblerMockFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseListItemResponseTestCaseGenerator(
            new GeneratorMock(
                UseCaseListItemResponseTestCaseGenerator::class,
                new UseCaseListItemResponseTestCaseFileObjectStub1()
            )
        );
    }

    private function mockRequestBuilder(): void
    {
        $this->mockCommonRequestBuilder();
        $this->mediator->setGetEntitiesUseCaseGeneratorRequestBuilder(
            new GetEntitiesUseCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseRequestDTOGeneratorRequestBuilder(
            new GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseAssemblerGeneratorRequestBuilder(
            new UseCaseListItemResponseAssemblerGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseGeneratorRequestBuilder(
            new UseCaseListItemResponseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseAssemblerImplGeneratorRequestBuilder(
            new UseCaseListItemResponseAssemblerImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseDTOGeneratorRequestBuilder(
            new UseCaseListItemResponseDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseStubGeneratorRequestBuilder(
            new UseCaseListItemResponseStubGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseTestGeneratorRequestBuilder(
            new GetEntitiesUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseAssemblerMockGeneratorRequestBuilder(
            new UseCaseListItemResponseAssemblerMockGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseListItemResponseTestCaseGeneratorRequestBuilder(
            new UseCaseListItemResponseTestCaseGeneratorRequestBuilderImpl()
        );
    }
}
