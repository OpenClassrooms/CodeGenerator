<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\EditEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\EditEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\EditEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseRequestDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EditEntityUseCaseRequestDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\DTO\Request\EditEntityUseCaseTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\UseCases\EditEntityUseCaseTestGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases\Impl\EditEntityUseCaseMediatorImpl;
use OpenClassrooms\CodeGenerator\Mediators\Options;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\EditEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\EditEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseRequestBuilderImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditEntityUseCaseRequestDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EntityUseCaseCommonRequestTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases\EditEntityUseCaseTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Entities\Impl\EntitiesMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseDetailResponseMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Responses\Impl\UseCaseResponseCommonMediatorMock;
use OpenClassrooms\CodeGenerator\Tests\Mediators\MediatorFileObjectTestCase;
use PHPUnit\Framework\TestCase;

class EditEntityUseCaseMediatorImplTest extends TestCase
{
    use MediatorFileObjectTestCase;
    use CommonEntityUseCaseMediatorTestTrait;

    /**
     * @var EditEntityUseCaseMediatorImpl
     */
    private $mediator;

    /**
     * @var array
     */
    private $options;

    protected function setUp(): void
    {
        InMemoryFileObjectGateway::$fileObjects = [];
        $this->mediator = new EditEntityUseCaseMediatorImpl();
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
        $this->mediator->setEditEntityUseCaseGenerator(
            new GeneratorMock(EditEntityUseCaseGenerator::class, new EditEntityUseCaseFileObjectStub1())
        );
        $this->mediator->setEditEntityUseCaseRequestGenerator(
            new GeneratorMock(
                EditEntityUseCaseRequestGenerator::class,
                new EditEntityUseCaseRequestFileObjectStub1()
            )
        );
        $this->mediator->setEditEntityUseCaseTestGenerator(
            new GeneratorMock(EditEntityUseCaseTestGenerator::class, new EditEntityUseCaseTestFileObjectStub1())
        );
        $this->mediator->setEditEntityUseCaseRequestBuilderGenerator(
            new GeneratorMock(
                EditEntityUseCaseRequestBuilderGenerator::class,
                new EditEntityUseCaseRequestBuilderFileObjectStub1()
            )
        );
        $this->mediator->setEditEntityUseCaseRequestBuilderImplGenerator(
            new GeneratorMock(
                EditEntityUseCaseRequestBuilderImplGenerator::class,
                new EditEntityUseCaseRequestBuilderImplFileObjectStub1()

            )
        );
        $this->mediator->setEditEntityUseCaseRequestDTOGenerator(
            new GeneratorMock(
                EditEntityUseCaseRequestDTOGenerator::class,
                new EditEntityUseCaseRequestDTOFileObjectStub1()
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
        $this->mediator->setEditEntityUseCaseGeneratorRequestBuilder(
            new EditEntityUseCaseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEditEntityUseCaseTestGeneratorRequestBuilder(
            new EditEntityUseCaseTestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEditEntityUseCaseRequestBuilderImplGeneratorRequestBuilder(
            new EditEntityUseCaseRequestBuilderImplGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEditEntityUseCaseRequestDTOGeneratorRequestBuilder(
            new EditEntityUseCaseRequestDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEditEntityUseCaseRequestGeneratorRequestBuilder(
            new EditEntityUseCaseRequestGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEditEntityUseCaseRequestBuilderGeneratorRequestBuilder(
            new EditEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityUseCaseCommonRequestTraitGeneratorRequestBuilder(
            new EntityUseCaseCommonRequestTraitGeneratorRequestBuilderImpl()
        );
    }
}
