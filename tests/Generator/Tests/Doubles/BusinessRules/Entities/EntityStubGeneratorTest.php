<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\DTO\Request\EntityStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\EntityStubGenerator;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Entities\Request\EntityStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Entities\Impl\EntityStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityGetFixedValue;
use PHPUnit\Framework\TestCase;

class EntityStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private EntityStubGenerator $entityStubGenerator;

    private EntityStubGeneratorRequest $request;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->entityStubGenerator->generate($this->request);
        $expectedFileObject = InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()];

        $this->assertSame(
            $expectedFileObject->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new EntityStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $stub1GeneratorRequestBuilder = new EntityStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->entityStubGenerator = new EntityStubGenerator();

        $this->entityStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->entityStubGenerator->setTemplating(new TemplatingServiceMock());
        $this->entityStubGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->entityStubGenerator->setEntityStubSkeletonModelAssembler(
            new EntityStubSkeletonModelAssemblerImpl()
        );
        $this->entityStubGenerator->setStubUtilityStrategy(new StubUtilityContext(new StubUtilityGetFixedValue()));
    }
}
