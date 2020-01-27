<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Mediators\BusinessRules\Entities\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Repository\DTO\Request\EntityRepositoryGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\App\Repository\EntityRepositoryGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\DTO\Request\EntityNotFoundExceptionGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Generator\BusinessRules\Gateways\EntityNotFoundExceptionGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request\EntityStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\DTO\Request\InMemoryEntityGatewayGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayGenerator;
use OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Entities\Impl\EntitiesMediatorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Repository\EntityRepositoryFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways\EntityNotFoundExceptionFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Gateways\InMemoryEntityGatewayFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Generator\GeneratorMock;

class EntitiesMediatorMock extends EntitiesMediatorImpl
{
    public function __construct()
    {
        $this->setEntityGatewayGenerator(
            new GeneratorMock(EntityGatewayGenerator::class, new EntityGatewayFileObjectStub1())
        );
        $this->setEntityGatewayGeneratorRequestBuilder(new EntityGatewayGeneratorRequestBuilderImpl());
        $this->setEntityNotFoundExceptionGenerator(
            new GeneratorMock(EntityNotFoundExceptionGenerator::class, new EntityNotFoundExceptionFileObjectStub1())
        );
        $this->setEntityNotFoundExceptionGeneratorRequestBuilder(
            new EntityNotFoundExceptionGeneratorRequestBuilderImpl()
        );
        $this->setEntityRepositoryGenerator(
            new GeneratorMock(EntityRepositoryGenerator::class, new EntityRepositoryFileObjectStub1())
        );
        $this->setEntityRepositoryGeneratorRequestBuilder(new EntityRepositoryGeneratorRequestBuilderImpl());
        $this->setEntityStubGenerator(new GeneratorMock(EntityStubGenerator::class, new EntityStubFileObjectStub1()));
        $this->setEntityStubGeneratorRequestBuilder(new EntityStubGeneratorRequestBuilderImpl());
        $this->setInMemoryEntityGatewayGenerator(
            new GeneratorMock(InMemoryEntityGatewayGenerator::class, new InMemoryEntityGatewayFileObjectStub1())
        );
        $this->setInMemoryEntityGatewayGeneratorRequestBuilder(new InMemoryEntityGatewayGeneratorRequestBuilderImpl());
    }
}
