<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\SkeletonModels\ViewModels\Tests\Impl\ViewModelTestSkeletonModelDetailAssemblerImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\Request\ViewModelTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelTestGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectGatewayMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\ViewModelFileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\Templating\TemplatingMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestGeneratorTest extends TestCase
{
    /**
     * @var ViewModelTestGeneratorRequest
     */
    private $request;

    /**
     * @var ViewModelTestGenerator
     */
    private $viewModelTestGenerator;

    /**
     * @test
     */
    public function generate()
    {
        $actualFileObject = $this->viewModelTestGenerator->generate($this->request);

        $this->assertContains(ViewModelFileObjectFactoryMock::class, $actualFileObject->getContent());
    }

    public function setUp()
    {
        $viewModelTestGeneratorRequestBuilder = new ViewModelTestGeneratorRequestBuilderImpl();
        $this->request = $viewModelTestGeneratorRequestBuilder
            ->create()
            ->withResponseClassName('null')
            ->build();

        $this->viewModelTestGenerator = new ViewModelTestGenerator();
        $this->viewModelTestGenerator->setFileObjectFactory(
            new ViewModelFileObjectFactoryMock()
        ); //contains return value
        $this->viewModelTestGenerator->setFileObjectGateway(new FileObjectGatewayMock());
        $this->viewModelTestGenerator->setViewModelTestDetailAssembler(new ViewModelTestSkeletonModelDetailAssemblerImpl());

        $this->viewModelTestGenerator->setUseCaseInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setUseCaseRequestInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setUseCaseResponseInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setUseCaseResponseInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setTemplating(new TemplatingMock());

    }
}
