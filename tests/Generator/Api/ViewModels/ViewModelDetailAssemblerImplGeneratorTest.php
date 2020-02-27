<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerImplGeneratorRequestBuilder;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelDetailAssemblerImplSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailAssemblerImpl\ViewModelDetailAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

class ViewModelDetailAssemblerImplGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    /**
     * @var ViewModelDetailAssemblerImplGeneratorRequestBuilder
     */
    private $request;

    /**
     * @var ViewModelDetailAssemblerImplGenerator
     */
    private $viewModelDetailAssemblerImplGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelDetailAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $this->viewModelDetailAssemblerImplGenerator = new ViewModelDetailAssemblerImplGenerator();
        $viewModelDetailAssemblerImplRequestBuilder = new ViewModelDetailAssemblerImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailAssemblerImplRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelDetailAssemblerImplGenerator);
        $this->viewModelDetailAssemblerImplGenerator->setViewModelDetailAssemblerImplSkeletonModelBuilder(
            new ViewModelDetailAssemblerImplSkeletonModelBuilderImpl()
        );
    }
}
