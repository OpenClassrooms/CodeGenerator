<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl\ShowControllerGeneratorImpl;
use OpenClassrooms\CodeGenerator\Generator\Generator;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ControllerClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\EntityClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\UseCaseClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ViewModelClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\FunctionalEntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowControllerGeneratorImplTest extends GeneratorTestCase
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
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/ShowFunctionalEntityController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\ShowFunctionalEntityController';

        $actual = $this->generator->generate(FunctionalEntityDetailResponseDTO::class);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);
    }

    /**
     * @test
     */
    public function generateAdmin()
    {
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/Admin/ShowFunctionalEntityController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\Admin\ShowFunctionalEntityController';

        $actual = $this->generator->generate(FunctionalEntityDetailResponseDTO::class, [Generator::ADMIN => true]);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);
    }

    protected function setUp()
    {
        $this->generator = new ShowControllerGeneratorImpl();
        $this->generator->setEntityClassObjectService(new EntityClassObjectServiceMock());
        $this->generator->setControllerClassObjectService(new ControllerClassObjectServiceMock());
        $this->generator->setUseCaseClassObjectService(new UseCaseClassObjectServiceMock());
        $this->generator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        parent::setUp();
    }
}
