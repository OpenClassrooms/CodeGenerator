<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityDetailResponse;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse;
use PHPUnit\Framework\Assert as Assert;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait FunctionalEntityResponseTestCase
{
    protected function assertFunctionalEntityDetailResponse(
        FunctionalEntityDetailResponse $expected,
        FunctionalEntityDetailResponse $actual
    ) {
        $this->assertFunctionalEntityResponse($expected, $actual);
    }

    private function assertFunctionalEntityResponse(
        FunctionalEntityResponse $expected,
        FunctionalEntityResponse $actual
    ) {
        Assert::assertSame($expected->getId(), $actual->getId());
        Assert::assertSame($expected->getField1(), $actual->getField1());
        Assert::assertSame($expected->getField2(), $actual->getField2());
        Assert::assertSame($expected->isField3(), $actual->isField3());
        Assert::assertSame($expected->getField4(), $actual->getField4());
    }
}
