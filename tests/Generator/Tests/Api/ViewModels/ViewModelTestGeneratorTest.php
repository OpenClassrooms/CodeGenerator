<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequest;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequestBuilderImpl;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelTestGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectGatewayMock;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class ViewModelTestGeneratorTest extends TestCase
{
    /**
     * @var ViewModelTestGenerator
     */
    private $viewModelTestGenerator;

    /**
     * @var string
     */
    private $fileContent;

    /**
     * @var ViewModelTestGeneratorRequest
     */
    private $request;

    /**
     * @test
     * @group viewmodels
     */
    public function generate()
    {
        $this->request->responseClassName = ViewModelTestGenerator::class;

        $actualFileObject = $this->viewModelTestGenerator->generate($this->request);

        $this->assertContains($this->fileContent, $actualFileObject->getContent());
    }

    public function setUp()
    {
        $this->request = (new ViewModelTestGeneratorRequestBuilderImpl())->create()->build();
        $this->fileContent = file_get_contents('../../../../../src/Skeleton/App/Tests/ViewModelTest.php.twig');

        $templatingMock = $this->createMock(\Twig_Environment::class);
        $templatingMock->method('render')->willReturn($this->fileContent);

        $this->viewModelTestGenerator = new ViewModelTestGenerator();
        $this->viewModelTestGenerator->setFileObjectFactory(new FileObjectFactoryMock());
        $this->viewModelTestGenerator->setFileObjectGateway(new FileObjectGatewayMock());

        $this->viewModelTestGenerator->setUseCaseInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setUseCaseRequestInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setUseCaseResponseInterfaceClassName(__CLASS__);
        $this->viewModelTestGenerator->setTemplating($templatingMock);

    }
}
