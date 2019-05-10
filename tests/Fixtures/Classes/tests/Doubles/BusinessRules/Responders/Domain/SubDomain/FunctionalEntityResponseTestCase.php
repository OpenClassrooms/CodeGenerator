<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use PHPUnit\Framework\Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FunctionalEntityResponseTestCase
{
    public function assertFunctionalEntityResponse(
        FunctionalEntityResponse $expected,
        FunctionalEntityResponse $actual
    ): void {
        Assert::assertSame($expected->getId(), $actual->getId());
        Assert::assertSame($expected->getField1(), $actual->getField1());
        Assert::assertSame($expected->getField2(), $actual->getField2());
        Assert::assertSame($expected->isField3(), $actual->isField3());
    }
}
