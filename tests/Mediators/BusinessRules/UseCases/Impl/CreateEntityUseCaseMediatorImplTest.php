<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Entity\DTO\Request\EntityFactoryImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Entity\EntityFactoryImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\DTO\Request\EntityFactoryGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Entities\EntityFactoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateRequestTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityCommonHydratorTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityCommonHydratorTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\CreateEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Entity\EntityFactoryImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFactoryFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateRequestTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EntityCommonHydratorTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Entities\Impl\EntitiesMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseDetailResponseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseResponseCommonMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class CreateEntityUseCaseMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;
    use CommonEntityUseCaseMediatorTestTrait;

    private CreateEntityUseCaseMediatorImpl $mediator;

    private array $options;

    protected function setUp(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new CreateEntityUseCaseMediatorImpl();
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
        $this->mediator->setCreateEntityUseCaseGenerator(
            new GeneratorMock(CreateEntityUseCaseGenerator::class, new CreateEntityUseCaseFileObjectStub1())
        );
        $this->mediator->setCreateEntityUseCaseRequestGenerator(
            new GeneratorMock(
                CreateEntityUseCaseRequestGenerator::class,
                new CreateEntityUseCaseRequestFileObjectStub1()
            )
        );
        $this->mediator->setCreateEntityUseCaseTestGenerator(
            new GeneratorMock(CreateEntityUseCaseTestGenerator::class, new CreateEntityUseCaseTestFileObjectStub1())
        );
        $this->mediator->setCreateRequestTraitGenerator(
            new GeneratorMock(
                CreateRequestTraitGenerator::class,
                new CreateRequestTraitFileObjectStub1()
            )
        );
        $this->mediator->setEntityCommonHydratorTraitGenerator(
            new GeneratorMock(
                EntityCommonHydratorTraitGenerator::class,
                new EntityCommonHydratorTraitFileObjectStub1()
            )
        );
        $this->mediator->setEntityUseCaseCommonRequestTraitGenerator(
            new GeneratorMock(
                EntityUseCaseCommonRequestTraitGenerator::class,
                new EntityUseCaseCommonRequestTraitFileObjectStub1()
            )
        );
        $this->mediator->setEntityFactoryGenerator(
            new GeneratorMock(EntityFactoryGenerator::class, new EntityFactoryFileObjectStub1())
        );
        $this->mediator->setEntityFactoryImplGenerator(
            new GeneratorMock(EntityFactoryImplGenerator::class, new EntityFactoryImplFileObjectStub1())
        );
    }

    private function mockRequestBuilder(): void
    {
        $this->mediator->setCreateEntityUseCaseGeneratorRequestBuilder(
            new CreateEntityUseCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setCreateEntityUseCaseTestGeneratorRequestBuilder(
            new CreateEntityUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setCreateEntityUseCaseRequestGeneratorRequestBuilder(
            new CreateEntityUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setCreateRequestTraitGeneratorRequestBuilder(
            new CreateRequestTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityCommonHydratorTraitGeneratorRequestBuilder(
            new EntityCommonHydratorTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityUseCaseCommonRequestTraitGeneratorRequestBuilder(
            new EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityFactoryGeneratorRequestBuilder(new EntityFactoryGeneratorRequestBuilderImpl());
        $this->mediator->setEntityFactoryImplGeneratorRequestBuilder(
            new EntityFactoryImplGeneratorRequestBuilderImpl()
        );
    }
}
