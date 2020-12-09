<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\GetEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\GetEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\GetEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\GetEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\GetEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\GetEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Entities\Impl\EntitiesMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseDetailResponseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseResponseCommonMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class GetEntityUseCaseMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;
    use CommonEntityUseCaseMediatorTestTrait;

    /**
     * @var GetEntityUseCaseMediatorImpl
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

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
    }

    private function mockRequestBuilder(): void
    {
        $this->mediator->setGetEntityUseCaseGeneratorRequestBuilder(new GetEntityUseCaseGeneratorRequestBuilderImpl());
        $this->mediator->setGetEntityUseCaseTestGeneratorRequestBuilder(
            new GetEntityUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntityUseCaseRequestGeneratorRequestBuilder(
            new GetEntityUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setGetEntityUseCaseRequestBuilderGeneratorRequestBuilder(
            new GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
    }
}
