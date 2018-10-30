<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Tests\Api\ViewModels;

use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\DTO\Request\ViewModelTestGeneratorRequestDTO;
use OpenClassrooms\CodeGenerator\Generator\Tests\Api\ViewModels\ViewModelTestGenerator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectFactoryMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\FileObjectGatewayMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\TemplatingMock;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@openclassrooms.com>
 */
class ViewModelTestGeneratorTest extends TestCase
{
    /**
     * @var ViewModelTestGenerator
     */
    private $viewModelTestGenerator;

    /**
     * @test
     */
    public function generate()
    {
        $generatorRequest = new ViewModelTestGeneratorRequestDTO();
        TestClassUtil::setProperty('responseClassName', __CLASS__, $generatorRequest);

        $actual = $this->viewModelTestGenerator->generate($generatorRequest);

        $this->assertSame('test', $actual);
    }

    public function setUp()
    {
        $this->viewModelTestGenerator = new ViewModelTestGenerator();
        $templatingMock = $this->createMock(\Twig_Environment::class);
        $templatingMock->method('render')->willReturn('');

        $this->viewModelTestGenerator->setFileObjectFactory(new FileObjectFactoryMock());
        $this->viewModelTestGenerator->setFileObjectGateway(new FileObjectGatewayMock());
        $this->viewModelTestGenerator->setTemplating($templatingMock);
    }
}
