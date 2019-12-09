<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntitiesUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GetEntitiesUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\Args;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GetEntitiesUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntitiesUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntitiesUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntitiesUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntitiesUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Entities\Impl\EntitiesMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseListItemResponseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseResponseCommonMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\FlushedFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class GetEntitiesUseCaseMediatorImplTest extends TestCase
{
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
        $this->mediator = new GetEntitiesUseCaseMediatorImpl();
        $this->mediator->setEntitiesMediator(new EntitiesMediatorMock());
        $this->mediator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->mediator->setUseCaseListItemResponseMediator(new UseCaseListItemResponseMediatorMock());
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
        $this->mediator->setGetEntitiesUseCaseGenerator(
            new GeneratorMock(GetEntitiesUseCaseGenerator::class, new GetEntitiesUseCaseFileObjectStub1())
        );
        $this->mediator->setGetEntitiesUseCaseRequestGenerator(
            new GeneratorMock(GetEntitiesUseCaseRequestGenerator::class, new GetEntitiesUseCaseRequestFileObjectStub1())
        );
        $this->mediator->setGetEntitiesUseCaseRequestBuilderGenerator(
            new GeneratorMock(
                GetEntitiesUseCaseRequestBuilderGenerator::class,
                new GetEntitiesUseCaseRequestBuilderFileObjectStub1()
            )
        );
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
        $this->mediator->setGetEntitiesUseCaseTestGenerator(
            new GeneratorMock(GetEntitiesUseCaseTestGenerator::class, new GetEntitiesUseCaseTestFileObjectStub1())
        );
    }

    private function mockRequestBuilder(): void
    {
        $this->mediator->setGetEntitiesUseCaseRequestGeneratorRequestBuilder(
            new GetEntitiesUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseRequestBuilderGeneratorRequestBuilder(
            new GetEntitiesUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseGeneratorRequestBuilder(
            new GetEntitiesUseCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseTestGeneratorRequestBuilder(
            new GetEntitiesUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new GetEntitiesUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntitiesUseCaseRequestDTOGeneratorRequestBuilder(
            new GetEntitiesUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
    }
}
