<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelDetailAssemblerTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelDetailAssemblerTestGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Tests\Api\ViewModels\Impl\ViewModelDetailAssemblerTestSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Api\ViewModels\ViewModelDetailAssemblerImplTest\ViewModelDetailAssemblerTestFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\UseCaseResponseFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use PHPUnit\Framework\TestCase;

final class ViewModelDetailAssemblerTestGeneratorTest extends TestCase
{
    use FileObjectTestCase;

    private ViewModelDetailAssemblerTestGeneratorRequest $request;

    private ViewModelDetailAssemblerTestGenerator $viewModelDetailAssemblerTestGenerator;

    /** @test */
    public function generate(): void
    {
        $actualFileObject = $this->viewModelDetailAssemblerTestGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerTestFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelDetailAssemblerImplTestGeneratorRequestBuilderImpl();
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelDetailAssemblerTestGenerator = new ViewModelDetailAssemblerTestGenerator();
        $this->viewModelDetailAssemblerTestGenerator->setViewModelFileObjectFactory(
            new ViewModelFileObjectFactoryMock()
        );
        $this->viewModelDetailAssemblerTestGenerator->setUseCaseResponseFileObjectFactory(
            new UseCaseResponseFileObjectFactoryMock()
        );
        $this->viewModelDetailAssemblerTestGenerator->setFileObjectGateway(new InMemoryFileObjectGateway());
        $this->viewModelDetailAssemblerTestGenerator->setTemplating(new TemplatingServiceMock());
        $this->viewModelDetailAssemblerTestGenerator->setViewModelDetailAssemblerTestSkeletonModelBuilder(
            new ViewModelDetailAssemblerTestSkeletonModelBuilderImpl()
        );
    }
}
