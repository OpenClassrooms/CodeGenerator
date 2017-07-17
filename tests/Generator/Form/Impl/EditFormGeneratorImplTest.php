<?php

namespace OpenClassrooms\CodeGenerator\Tests\Generator\Form\Impl;

use OpenClassrooms\CodeGenerator\Generator\Form\Impl\EditFormGeneratorImpl;
use OpenClassrooms\CodeGenerator\Tests\Doubles\BusinessRules\UseCases\Domain\SubDomain\DTO\Request\EditEntityRequestDTO;
use PHPUnit\Framework\TestCase;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class EditFormGeneratorImplTest extends TestCase
{
    /**
     * @var EditFormGeneratorImpl
     */
    private $generator;

    /**
     * @test
     */
     public function render(){
         $this->assertTrue(printf($this->generator->generate(EditEntityRequestDTO::class)));

    }

    protected function setUp()
    {
        $this->generator = new EditFormGeneratorImpl();
    }

}
