<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Doubles\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\DTO\Request\ViewModelListItemStubGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\Request\ViewModelListItemStubGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Tests\Doubles\Api\ViewModels\ViewModelListItemStubGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Doubles\Api\ViewModels\Impl\ViewModelListItemStubSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemStub\ViewModelListItemStubFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityGetFixedValue;
use PHPUnit\Framework\TestCase;

class ViewModelListItemStubGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelListItemStubGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelListItemStubGenerator
     */
    private $viewModelStub1Generator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelStub1Generator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemStubFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $stub1GeneratorRequestBuilder = new ViewModelListItemStubGeneratorRequestBuilderImpl();
        $this->request = $stub1GeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelStub1Generator = new ViewModelListItemStubGenerator();

        $this->viewModelStub1Generator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelStub1Generator->setStubUtilityStrategy(new StubUtilityContext(new StubUtilityGetFixedValue()));
        $this->viewModelStub1Generator->setTemplating(new TemplatingServiceMock());
        $this->viewModelStub1Generator->setUseCaseResponseFileObjectFactory(new UseCaseResponseFileObjectFactoryMock());
        $this->viewModelStub1Generator->setViewModelFileObjectFactory(new ViewModelFileObjectFactoryMock());
        $this->viewModelStub1Generator->setViewModelStubListItemSkeletonModelAssembler(
            new ViewModelListItemStubSkeletonModelAssemblerImpl()
        );
    }
}
