<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Controller\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl\ListControllerGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ControllerClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\UseCaseClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ViewModelClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Response\EntityDetailResponseDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ListControllerGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\App\Controller\Impl\ListControllerGeneratorImpl
     */
    protected $generator;

    /**
     * @test
     */
    public function generate()
    {
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/ListEntitiesController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\ListEntitiesController';

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
            __DIR__.'/../../../../Doubles/src/App/Controller/Web/Domain/SubDomain/Admin/ListEntitiesController.php'
        );
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\Admin\ListEntitiesController';

        $actual = $this->generator->generate(EntityDetailResponseDTO::class, true);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);
    }

    protected function setUp()
    {
        $this->generator = new ListControllerGeneratorImpl();
        $this->generator->setControllerClassObjectService(new ControllerClassObjectServiceMock());
        $this->generator->setUseCaseClassObjectService(new UseCaseClassObjectServiceMock());
        $this->generator->setViewModelClassObjectService(new ViewModelClassObjectServiceMock());
        parent::setUp();
    }
}
