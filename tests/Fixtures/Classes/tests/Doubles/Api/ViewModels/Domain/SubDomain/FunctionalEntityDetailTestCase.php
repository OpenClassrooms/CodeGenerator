<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntityDetail;
use PHPUnit\Framework\Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FunctionalEntityDetailTestCase
{
    use FunctionalEntityTestCase;

    public function FunctionalEntityDetailTestCase(
        FunctionalEntityDetail $expected,
        FunctionalEntityDetail $actual
    ): void
    {
        $this->assertFunctionalEntityTestCase($expected, $actual);
        Assert::assertEquals($expected->field4, $actual->field4);
    }
}