<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\FunctionalEntity;
use PHPUnit\Framework\Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FunctionalEntityTestCase
{
    public function assertFunctionalEntityTestCase(
        FunctionalEntity $expected,
        FunctionalEntity $actual
    ): void
    {
        Assert::assertEquals($expected->id, $actual->id);
        Assert::assertEquals($expected->field1, $actual->field1);
        Assert::assertEquals($expected->field2, $actual->field2);
        Assert::assertEquals($expected->field3, $actual->field3);
    }
}