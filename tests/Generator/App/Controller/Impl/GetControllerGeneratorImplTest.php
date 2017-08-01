<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl\GetControllerAbstractGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetControllerGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @var GetControllerAbstractGeneratorImpl
     */
    protected $generator;

    /**
     * @test
     */
    public function generate()
    {
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/GetEntityController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\GetEntityController';

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
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/Admin/GetEntityController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\Admin\GetEntityController';

        $actual = $this->generator->generate(EntityDetailResponseDTO::class, true);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);
    }

    protected function setUp()
    {
        $this->generator = new GetControllerAbstractGeneratorImpl();
        parent::setUp();
    }
}
