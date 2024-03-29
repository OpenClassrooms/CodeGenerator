<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseDetailResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseDetailResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseDetailResponseStubGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl\UseCaseDetailResponseStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseDetailResponseStub\UseCaseDetailResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityGetFixedValue;
use PHPUnit\Framework\TestCase;

class UseCaseDetailResponseStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private UseCaseDetailResponseStubGeneratorRequest $request;

    private UseCaseDetailResponseStubGenerator $useCaseDetailResponseStubGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseDetailResponseStubGenerator->generate($this->request);
        $expectedFileObject = InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()];

        $this->assertSame(
            $expectedFileObject->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseDetailResponseStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $useCaseDetailResponseStubGeneratorRequestBuilder = new UseCaseDetailResponseStubGeneratorRequestBuilderImpl();
        $this->request = $useCaseDetailResponseStubGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityResponse::class)
            ->build();

        $this->useCaseDetailResponseStubGenerator = new UseCaseDetailResponseStubGenerator();

        $this->useCaseDetailResponseStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseDetailResponseStubGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseDetailResponseStubGenerator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
        $this->useCaseDetailResponseStubGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseDetailResponseStubGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseDetailResponseStubGenerator->setStubUtilityStrategy(
            new StubUtilityContext(new StubUtilityGetFixedValue())
        );
        $this->useCaseDetailResponseStubGenerator->setUseCaseDetailResponseStubSkeletonModelAssembler(
            new UseCaseDetailResponseStubSkeletonModelAssemblerImpl()
        );
    }
}
