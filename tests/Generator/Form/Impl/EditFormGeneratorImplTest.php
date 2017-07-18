<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Form\Impl;

use OpenClassrooms\CodeGenerator\Generator\Form\Impl\EditFormGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditEntityRequestDTO;
use OpenClassrooms\CodeGenerator\Tests\Generator\GeneratorTestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EditFormGeneratorImplTest extends GeneratorTestCase
{
    /**
     * @var EditFormGeneratorImpl
     */
    protected $generator;

    /**
     * @test
     */
    public function render()
    {
        $actual = $this->generator->generate(EditEntityRequestDTO::class);
        $expected = file_get_contents(
            __DIR__.'/../../../Doubles/src/App/Form/Type/Domain/SubDomain/EditEntityType.php'
        );

        $this->assertSame($expected, $actual);

    }

    protected function setUp()
    {
        $this->generator = new EditFormGeneratorImpl();
        parent::setUp();
    }

}
