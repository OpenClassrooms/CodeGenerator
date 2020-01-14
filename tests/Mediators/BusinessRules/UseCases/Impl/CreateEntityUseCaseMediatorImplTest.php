<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\CreateEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\CreateEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\CreateEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\CreateEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\CreateEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\CreateEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\CreateEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\CreateEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\CreateEntityUseCaseRequestDTOFileObjectStub1;
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

    /**
     * @var CreateEntityUseCaseMediatorImpl
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

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
        $this->mediator->setCreateEntityUseCaseRequestBuilderGenerator(
            new GeneratorMock(
                CreateEntityUseCaseRequestBuilderGenerator::class,
                new CreateEntityUseCaseRequestBuilderFileObjectStub1()
            )
        );
        $this->mediator->setCreateEntityUseCaseRequestBuilderImplGenerator(
            new GeneratorMock(
                CreateEntityUseCaseRequestBuilderImplGenerator::class,
                new CreateEntityUseCaseRequestBuilderImplFileObjectStub1()

            )
        );
        $this->mediator->setCreateEntityUseCaseRequestDTOGenerator(
            new GeneratorMock(
                CreateEntityUseCaseRequestDTOGenerator::class,
                new CreateEntityUseCaseRequestDTOFileObjectStub1()
            )
        );
        $this->mediator->setEntityUseCaseCommonRequestTraitGenerator(
            new GeneratorMock(
                EntityUseCaseCommonRequestTraitGenerator::class,
                new EntityUseCaseCommonRequestTraitFileObjectStub1()
            )
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
        $this->mediator->setCreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new CreateEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setCreateEntityUseCaseRequestDTOGeneratorRequestBuilder(
            new CreateEntityUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setCreateEntityUseCaseRequestGeneratorRequestBuilder(
            new CreateEntityUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setCreateEntityUseCaseRequestBuilderGeneratorRequestBuilder(
            new CreateEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityUseCaseCommonRequestTraitGeneratorRequestBuilder(
            new EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl()
        );
    }
}
