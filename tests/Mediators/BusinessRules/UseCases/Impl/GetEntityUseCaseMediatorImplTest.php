<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GetEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Entities\Impl\EntitiesMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseDetailResponseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseResponseCommonMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\FlushedFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class GetEntityUseCaseMediatorImplTest extends TestCase
{
    use FlushedFileObjectTestCase;

    /**
     * @var GetEntityUseCaseMediatorImpl
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

    /**
     * @test
     */
    public function generateGenericUseCase_withDump(): void
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
    public function generateGenericUseCase_withoutOptions(): void
    {
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
    public function generateGenericUseCase_withoutTest(): void
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
    public function generateGenericUseCase_withTestOnly(): void
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

    protected function setUp(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new GetEntityUseCaseMediatorImpl();
        $this->mediator->setEntitiesMediator(new EntitiesMediatorMock());
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->mediator->setUseCaseDetailResponseMediator(new UseCaseDetailResponseMediatorMock());
        $this->mediator->setUseCaseResponseCommonMediator(new UseCaseResponseCommonMediatorMock());

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
        $this->mediator->setGetEntityUseCaseGenerator(
            new GeneratorMock(GetEntityUseCaseGenerator::class, new GetEntityUseCaseFileObjectStub1())
        );
        $this->mediator->setGetEntityUseCaseRequestGenerator(
            new GeneratorMock(GetEntityUseCaseRequestGenerator::class, new GetEntityUseCaseRequestFileObjectStub1())
        );
        $this->mediator->setGetEntityUseCaseTestGenerator(
            new GeneratorMock(GetEntityUseCaseTestGenerator::class, new GetEntityUseCaseTestFileObjectStub1())
        );
        $this->mediator->setGetEntityUseCaseRequestBuilderGenerator(
            new GeneratorMock(
                GetEntityUseCaseRequestBuilderGenerator::class,
                new GetEntityUseCaseRequestBuilderFileObjectStub1()
            )
        );
        $this->mediator->setGetEntityUseCaseRequestBuilderImplGenerator(
            new GeneratorMock(
                GetEntitiesUseCaseRequestBuilderImplGenerator::class,
                new GetEntitiesUseCaseRequestBuilderImplFileObjectStub1()

            )
        );
        $this->mediator->setGetEntityUseCaseRequestDTOGenerator(
            new GeneratorMock(
                GetEntitiesUseCaseRequestDTOGenerator::class,
                new GetEntitiesUseCaseRequestDTOFileObjectStub1()
            )
        );
    }

    private function mockRequestBuilder(): void
    {
        $this->mediator->setGetEntityUseCaseGeneratorRequestBuilder(new GetEntityUseCaseGeneratorRequestBuilderImpl());
        $this->mediator->setGetEntityUseCaseTestGeneratorRequestBuilder(
            new GetEntityUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new GetEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntityUseCaseRequestDTOGeneratorRequestBuilder(
            new GetEntityUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntityUseCaseRequestGeneratorRequestBuilder(
            new GetEntityUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntityUseCaseRequestBuilderGeneratorRequestBuilder(
            new GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
    }
}
