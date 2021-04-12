<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\DTO\Request\ViewModelGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\Request\ViewModelGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Api\ViewModels\ViewModelGenerator;
use OpenClassrooms\CodeGenerator\SkeletonModels\Api\ViewModels\Impl\ViewModelSkeletonModelAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel\ViewModelFileObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\FileObjectTestCase;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Gateways\FileObject\InMemoryFileObjectGateway;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use OpenClassrooms\CodeGenerator\Tests\Generator\Api\ViewModels\AbstractViewModelGeneratorTestCase;

class ViewModelGeneratorTest extends AbstractViewModelGeneratorTestCase
{
    use FileObjectTestCase;

    private ViewModelGeneratorRequest $request;

    private ViewModelGenerator $viewModelGenerator;

    /**
     * @test
     */
    public function generateReturnFileObject(): void
    {
        $actualFileObject = $this->viewModelGenerator->generate($this->request);

        $this->assertSame(
            InMemoryFileObjectGateway::$fileObjects[$actualFileObject->getId()]->getPath(),
            $actualFileObject->getPath()
        );
        $this->assertFileObject(new ViewModelFileObjectStub1(), $actualFileObject);
    }

    protected function setUp(): void
    {
        $viewModelGeneratorRequestBuilder = new ViewModelGeneratorRequestBuilderImpl();
        $this->request = $viewModelGeneratorRequestBuilder
            ->create()
            ->withClassName(FunctionalEntityResponse::class)
            ->build();

        $this->viewModelGenerator = new ViewModelGenerator();
        $this->buildViewModelGenerator($this->viewModelGenerator);

        $this->viewModelGenerator->setViewModelSkeletonModelAssembler(new ViewModelSkeletonModelAssemblerImpl());
    }
}
