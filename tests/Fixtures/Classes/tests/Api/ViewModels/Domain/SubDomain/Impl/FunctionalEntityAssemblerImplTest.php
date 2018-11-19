<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Api\ViewModels\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityTestCase;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityAssemblerImplTest extends TestCase
{
    use FunctionalEntityTestCase;

    /**
     * @var FunctionalEntityAssembler
     */
    private $assembler;

    /**
     * @test
     */
    public function onCreateShouldReturnViewModel()
    {
        $actual = $this->assembler->create(new FunctionalEntityResponseStub1());
        $this->assertFunctionalEntityTestCase(new FunctionalEntityStub1(), $actual);
    }

    protected function setUp()
    {
        $this->assembler = new FunctionalEntityAssemblerImpl();

    }
}
