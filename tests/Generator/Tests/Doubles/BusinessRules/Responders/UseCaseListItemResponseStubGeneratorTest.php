<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\DTO\Request\UseCaseListItemResponseStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\Request\UseCaseListItemResponseStubGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\BusinessRules\Responders\UseCaseListItemResponseStubGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\BusinessRules\Responders\Impl\UseCaseListItemResponseStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\EntityFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub\UseCaseListItemResponseStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityGetFixedValue;
use PHPUnit\Framework\TestCase;

class UseCaseListItemResponseStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private UseCaseListItemResponseStubGeneratorRequest $request;

    private UseCaseListItemResponseStubGenerator $useCaseListItemResponseStubGenerator;

    /**
     * @test
     */
    public function generateFromSelectedFieldReturnFileObject(): void
    {
        $actualFileObject = $this->useCaseListItemResponseStubGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new UseCaseListItemResponseStubFileObjectStub1(), $actualFileObject);
    }

    /**
     * @test
     */
    public function generateWithEmptyFieldReturnFileObject(): void
    {
        $useCaseListItemResponseStubGeneratorRequestBuilder = new UseCaseListItemResponseStubGeneratorRequestBuilderImpl(
        );
        $request = $useCaseListItemResponseStubGeneratorRequestBuilder->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->withFields([])
            ->build();

        $actualFileObject = $this->useCaseListItemResponseStubGenerator->generate($request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
    }

    protected function setUp(): void
    {
        $useCaseListItemResponseStubGeneratorRequestBuilder = new UseCaseListItemResponseStubGeneratorRequestBuilderImpl(
        );
        $this->request = $useCaseListItemResponseStubGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->withFields(['field1', 'field2', 'field3', 'id'])
            ->build();

        $this->useCaseListItemResponseStubGenerator = new UseCaseListItemResponseStubGenerator();

        $this->useCaseListItemResponseStubGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->useCaseListItemResponseStubGenerator->setTemplating(new TemplatingServiceMock());
        $this->useCaseListItemResponseStubGenerator->setViewModelFileObjectFactory(
            new ViewModelFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseStubGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->useCaseListItemResponseStubGenerator->setEntityFileObjectFactory(new EntityFileObjectFactoryMock());
        $this->useCaseListItemResponseStubGenerator->setStubUtilityStrategy(
            new StubUtilityContext(new StubUtilityGetFixedValue())
        );
        $this->useCaseListItemResponseStubGenerator->setUseCaseListItemResponseStubSkeletonModelAssembler(
            new UseCaseListItemResponseStubSkeletonModelAssemblerImpl()
        );
    }
}
