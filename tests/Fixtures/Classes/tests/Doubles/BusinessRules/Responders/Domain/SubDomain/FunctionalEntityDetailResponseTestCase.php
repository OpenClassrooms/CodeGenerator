<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use PHPUnit\Framework\Assert;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait FunctionalEntityDetailResponseTestCase
{
    use FunctionalEntityResponseTestCase;

    public function assertFunctionalEntityDetailResponse(
        FunctionalEntityDetailResponse $expected,
        FunctionalEntityDetailResponse $actual
    ): void
    {
        $this->assertFunctionalEntityResponse($expected, $actual);
        Assert::assertSame($expected->getField4(), $actual->getField4());
    }
}
