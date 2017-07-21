<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\Controller\Impl\GetControllerGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetControllerGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @var GetControllerGeneratorImpl
     */
    protected $generator;

    /**
     * @test
     */
    public function generate()
    {
        $actual = $this->generator->generate(EntityDetailResponseDTO::class);
        $expected = file_get_contents(
            __DIR__.'/../../../Doubles/src/App/Controller/Web/Domain/SubDomain/GetEntityController.php'
        );
        $this->assertSame($expected, $actual);
    }

    /**
     * @test
     */
    public function generateAdmin()
    {
        $actual = $this->generator->generate(EntityDetailResponseDTO::class, true);
        $expected = file_get_contents(
            __DIR__.'/../../../Doubles/src/App/Controller/Web/Domain/SubDomain/Admin/GetEntityController.php'
        );
        $this->assertSame($expected, $actual);
    }

    protected function setUp()
    {
        $this->generator = new GetControllerGeneratorImpl();
        parent::setUp();
    }
}
