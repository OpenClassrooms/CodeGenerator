<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\App\Form\Impl;

use OpenClassrooms\CodeGenerator\Generator\App\Form\Impl\EditFormGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditEntityRequestDTO;
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
        $expectedClassName = 'OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Form\Type\Domain\SubDomain\EditEntityType';
        $expected = file_get_contents(
            __DIR__.'/../../../../Doubles/src/App/Form/Type/Domain/SubDomain/EditEntityType.php'
        );

        $actual = $this->generator->generate(EditEntityRequestDTO::class);

        $this->assertArrayHasKey($expectedClassName, $actual);
        $this->assertSame($expected, $actual[$expectedClassName]);

    }

    protected function setUp()
    {
        $this->generator = new EditFormGeneratorImpl();
        parent::setUp();
    }

}
