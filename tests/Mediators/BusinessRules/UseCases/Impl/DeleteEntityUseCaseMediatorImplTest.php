<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DeleteEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\DeleteEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\DeleteEntityUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\DeleteEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\DeleteEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\DeleteEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\DeleteEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\DeleteEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\DeleteEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\DeleteEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class DeleteEntityUseCaseMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;
    use CommonEntityUseCaseMediatorTestTrait;

    private DeleteEntityUseCaseMediatorImpl $mediator;

    private array $options;

    protected function setUp(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new DeleteEntityUseCaseMediatorImpl();
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
        $this->mediator->setDeleteEntityUseCaseGenerator(
            new GeneratorMock(DeleteEntityUseCaseGenerator::class, new DeleteEntityUseCaseFileObjectStub1())
        );
        $this->mediator->setDeleteEntityUseCaseRequestGenerator(
            new GeneratorMock(
                DeleteEntityUseCaseRequestGenerator::class,
                new DeleteEntityUseCaseRequestFileObjectStub1()
            )
        );
        $this->mediator->setDeleteEntityUseCaseTestGenerator(
            new GeneratorMock(DeleteEntityUseCaseTestGenerator::class, new DeleteEntityUseCaseTestFileObjectStub1())
        );
        $this->mediator->setDeleteEntityUseCaseRequestBuilderGenerator(
            new GeneratorMock(
                DeleteEntityUseCaseRequestBuilderGenerator::class,
                new DeleteEntityUseCaseRequestBuilderFileObjectStub1()
            )
        );
        $this->mediator->setDeleteEntityUseCaseRequestBuilderImplGenerator(
            new GeneratorMock(
                DeleteEntityUseCaseRequestBuilderImplGenerator::class,
                new DeleteEntityUseCaseRequestBuilderImplFileObjectStub1()
            )
        );
        $this->mediator->setDeleteEntityUseCaseRequestDTOGenerator(
            new GeneratorMock(
                DeleteEntityUseCaseRequestDTOGenerator::class,
                new DeleteEntityUseCaseRequestDTOFileObjectStub1()
            )
        );
    }

    private function mockRequestBuilder(): void
    {
        $this->mediator->setDeleteEntityUseCaseGeneratorRequestBuilder(
            new DeleteEntityUseCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setDeleteEntityUseCaseTestGeneratorRequestBuilder(
            new DeleteEntityUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setDeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new DeleteEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setDeleteEntityUseCaseRequestDTOGeneratorRequestBuilder(
            new DeleteEntityUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setDeleteEntityUseCaseRequestGeneratorRequestBuilder(
            new DeleteEntityUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setDeleteEntityUseCaseRequestBuilderGeneratorRequestBuilder(
            new DeleteEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
    }
}
