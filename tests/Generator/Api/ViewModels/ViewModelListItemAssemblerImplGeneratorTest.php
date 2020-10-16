<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelListItemAssemblerImplGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelListItemAssemblerImplGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelListItemAssemblerImplGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelListItemAssemblerImplSkeletonModelBuilderImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemAssemblerImpl\ViewModelListItemAssemblerImplFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;

class ViewModelListItemAssemblerImplGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    private ViewModelListItemAssemblerImplGeneratorRequest $request;

    private ViewModelListItemAssemblerImplGenerator $viewModelListItemAssemblerImplGenerator;

    /** @test */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelListItemAssemblerImplGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelListItemAssemblerImplFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $this->viewModelListItemAssemblerImplGenerator = new ViewModelListItemAssemblerImplGenerator();
        $viewModelListItemAssemblerImplRequestBuilder = new ViewModelListItemAssemblerImplGeneratorRequestBuilderImpl();
        $this->request = $viewModelListItemAssemblerImplRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->buildViewModelGenerator($this->viewModelListItemAssemblerImplGenerator);
        $this->viewModelListItemAssemblerImplGenerator->setViewModelListItemAssemblerImplSkeletonModelBuilder(
            new ViewModelListItemAssemblerImplSkeletonModelBuilderImpl()
        );
    }
}
