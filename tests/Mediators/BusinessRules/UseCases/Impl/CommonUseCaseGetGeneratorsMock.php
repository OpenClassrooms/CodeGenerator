<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\UseCases\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request\EntityRepositoryGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityNotFoundExceptionGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\DTO\Request\UseCaseResponseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Responders\UseCaseResponseGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\DTO\Request\UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseAssemblerTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request\EntityStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\DTO\Request\InMemoryEntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\DTO\Request\UseCaseResponseTestCaseGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Responders\UseCaseResponseTestCaseGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Repository\EntityRepositoryFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityNotFoundExceptionFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders\UseCaseResponseFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseAssemblerTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\UseCaseResponseCommonFieldTraitFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
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
        $this->mediator->setEntityStubGenerator(
            new GeneratorMock(EntityStubGenerator::class, new EntityStubFileObjectStub1())
        );
        $this->mediator->setInMemoryEntityGatewayGenerator(
            new GeneratorMock(
                InMemoryEntityGatewayGenerator::class,
                new InMemoryEntityGatewayFileObjectStub1()
            )
        );
        $this->mediator->setUseCaseResponseCommonFieldTraitGenerator(
            new GeneratorMock(UseCaseResponseCommonFieldTraitGenerator::class, new UseCaseResponseCommonFieldTraitFileObjectStub1())
        );
        $this->mediator->setUseCaseResponseGenerator(
            new GeneratorMock(UseCaseResponseGenerator::class, new UseCaseResponseFileObjectStub1())
        );
        $this->mediator->setUseCaseResponseAssemblerTraitGenerator(
            new GeneratorMock(
                UseCaseResponseAssemblerTraitGenerator::class,
                new UseCaseResponseAssemblerTraitFileObjectStub1()
            )
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
        $this->mediator->setEntityStubGeneratorRequestBuilder(new EntityStubGeneratorRequestBuilderImpl());
        $this->mediator->setInMemoryEntityGatewayGeneratorRequestBuilder(
            new InMemoryEntityGatewayGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseCommonFieldTraitGeneratorRequestBuilder(
            new UseCaseResponseCommonFieldTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseGeneratorRequestBuilder(
            new UseCaseResponseGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseAssemblerTraitGeneratorRequestBuilder(
            new UseCaseResponseAssemblerTraitGeneratorRequestBuilderImpl()
        );
        $this->mediator->setUseCaseResponseTestCaseGeneratorRequestBuilder(
            new UseCaseResponseTestCaseGeneratorRequestBuilderImpl()
        );
    }
}
