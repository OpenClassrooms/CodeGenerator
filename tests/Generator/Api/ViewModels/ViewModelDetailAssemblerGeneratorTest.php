<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelDetailAssemblerGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelDetailAssemblerGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelDetailAssemblerGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelDetailAssemblerSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailAssembler\ViewModelDetailAssemblerFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

class ViewModelDetailAssemblerGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    private ViewModelDetailAssemblerGeneratorRequest $request;

    private ViewModelDetailAssemblerGenerator $viewModelDetailAssemblerGenerator;

    /** @test */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelDetailAssemblerGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelDetailAssemblerFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $this->viewModelDetailAssemblerGenerator = new ViewModelDetailAssemblerGenerator();
        $viewModelDetailAssemblerRequestBuilder = new ViewModelDetailAssemblerGeneratorRequestBuilderImpl();
        $this->request = $viewModelDetailAssemblerRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelDetailAssemblerGenerator);
        $this->viewModelDetailAssemblerGenerator->setViewModelDetailAssemblerSkeletonModelAssembler(
            new ViewModelDetailAssemblerSkeletonModelAssemblerImpl()
        );
    }
}
