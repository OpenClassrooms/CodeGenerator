<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Api\ViewModels\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityDetailAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetailTestCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponseStub1;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityDetailAssemblerImplTest extends TestCase
{
    use FunctionalEntityDetailTestCase;

    /**
     * @var FunctionalEntityDetailAssembler
     */
    private $assembler;

    /**
     * @test
     */
    public function onCreateShouldReturnViewModel()
    {
        $actual = $this->assembler->create(new FunctionalEntityDetailResponseStub1());
        $expected = new FunctionalEntityDetailStub1();
        $this->assertFunctionalEntityTestCase($expected, $actual);
        $this->assertEquals($expected->getField4(), $actual->getField4());
    }

    protected function setUp()
    {
        $this->assembler = new FunctionalEntityDetailAssemblerImpl();
    }
}
