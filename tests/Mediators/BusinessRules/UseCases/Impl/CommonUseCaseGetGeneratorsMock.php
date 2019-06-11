<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request\EntityRepositoryGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityNotFoundExceptionGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestBuilderGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\DTO\Request\GetEntityUseCaseRequestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Requestors\GetEntityUseCaseRequestGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseDTOGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseDTOGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\DTO\Request\InMemoryEntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Repository\EntityRepositoryFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityNotFoundExceptionFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestBuilderFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors\GetEntityUseCaseRequestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseDTOFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait CommonUseCaseGetGeneratorsMock
{
    private function mockCommonGenerators(): void
    {
        $this->mediator->setEntityGatewayGenerator(
            new GeneratorMock(EntityGatewayGenerator::class, new EntityGatewayFileObjectStub1())
        );
        $this->mediator->setEntityNotFoundExceptionGenerator(
            new GeneratorMock(EntityNotFoundExceptionGenerator::class, new EntityNotFoundExceptionFileObjectStub1())
        );
        $this->mediator->setEntityRepositoryGenerator(
            new GeneratorMock(EntityRepositoryGenerator::class, new EntityRepositoryFileObjectStub1())
        );
        $this->mediator->setInMemoryEntityGatewayGenerator(
            new GeneratorMock(
                InMemoryEntityGatewayGenerator::class,
                new InMemoryEntityGatewayFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseResponseDTOGenerator(
            new GeneratorMock(UseCaseResponseDTOGenerator::class, new UseCaseResponseDTOFileObjectStub1())
        );
        $this->mediator->setUseCaseResponseGenerator(
            new GeneratorMock(UseCaseResponseGenerator::class, new UseCaseResponseFileObjectStub1())
        );
        $this->mediator->setUseCaseResponseTraitGenerator(
            new GeneratorMock(UseCaseResponseTraitGenerator::class, new UseCaseResponseTraitFileObjectStub1())
        );
        $this->mediator->setUseCaseResponseTestCaseGenerator(
            new GeneratorMock(UseCaseResponseTestCaseGenerator::class, new UseCaseResponseTestCaseFileObjectStub1())
        );
    }

    private function mockCommonRequestBuilder(): void
    {
        $this->mediator->setEntityGatewayGeneratorRequestBuilder(new EntityGatewayGeneratorRequestBuilderImpl());
        $this->mediator->setEntityNotFoundExceptionGeneratorRequestBuilder(
            new EntityNotFoundExceptionGeneratorRequestBuilderImpl()
        );
        $this->mediator->setEntityRepositoryGeneratorRequestBuilder(new EntityRepositoryGeneratorRequestBuilderImpl());
        $this->mediator->setInMemoryEntityGatewayGeneratorRequestBuilder(
            new InMemoryEntityGatewayGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseDTOGeneratorRequestBuilder(
            new UseCaseResponseDTOGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseGeneratorRequestBuilder(
            new UseCaseResponseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseTraitGeneratorRequestBuilder(
            new UseCaseResponseTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseTestCaseGeneratorRequestBuilder(
            new UseCaseResponseTestCaseGeneratorRequestBuilderImpl()
        );
    }
}
