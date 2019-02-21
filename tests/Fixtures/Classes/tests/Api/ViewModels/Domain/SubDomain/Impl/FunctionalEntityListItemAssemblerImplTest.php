<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Api\ViewModels\Domain\SubDomain\Impl;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItemAssembler;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityListItemAssemblerImpl;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItemStub1;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain\FunctionalEntityListItemTestCase;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub1;
use PHPUnit\Framework\TestCase;

/**
 * @author authorStub <author.stub@example.com>
 */
class FunctionalEntityListItemAssemblerImplTest extends TestCase
{
    use FunctionalEntityListItemTestCase;

    /**
     * @var FunctionalEntityListItemAssembler
     */
    private $assembler;

    /**
     * @test
     */
    public function onCreateShouldReturnViewModel()
    {
        $actual = $this->assembler->createListItems([new FunctionalEntityListItemResponseStub1()]);
        $expected = [new FunctionalEntityListItemStub1()];
        $this->assertFunctionalEntityListItems($expected, $actual);
    }

    protected function setUp()
    {
        $this->assembler = new FunctionalEntityListItemAssemblerImpl();
    }
}
