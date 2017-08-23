<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Form\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Form\Impl\EditFormGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\ControllerClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Services\FormClassObjectServiceMock;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditFunctionalEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EditFormGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @var \OpenClassrooms\CodeGenerator\Generator\App\Form\Impl\EditFormGeneratorImpl
     */
    protected $generator;

    /**
     * @test
     */
    public function render()
    {
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Form\Type\Domain\SubDomain\EditFunctionalEntityType';
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Form/Type/Domain/SubDomain/EditFunctionalEntityType.php'
        );

        $actual = $this->generator->generate(EditFunctionalEntityRequestDTO::class);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);

    }

    protected function setUp()
    {
        $this->generator = new EditFormGeneratorImpl();
        $this->generator->setControllerClassObjectService(new ControllerClassObjectServiceMock());
        $this->generator->setFormClassObjectService(new FormClassObjectServiceMock());
        parent::setUp();
    }

}
