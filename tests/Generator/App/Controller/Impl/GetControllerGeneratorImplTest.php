<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl\ShowControllerGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetControllerGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @var ShowControllerGeneratorImpl
     */
    protected $generator;

    /**
     * @test
     */
    public function generate()
    {
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/ShowEntityController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\ShowEntityController';

        $actual = $this->generator->generate(EntityDetailResponseDTO::class);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);
    }

    /**
     * @test
     */
    public function generateAdmin()
    {
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/Admin/ShowEntityController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\Admin\ShowEntityController';

        $actual = $this->generator->generate(EntityDetailResponseDTO::class, true);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);
    }

    protected function setUp()
    {
        $this->generator = new ShowControllerGeneratorImpl();
        parent::setUp();
    }
}
