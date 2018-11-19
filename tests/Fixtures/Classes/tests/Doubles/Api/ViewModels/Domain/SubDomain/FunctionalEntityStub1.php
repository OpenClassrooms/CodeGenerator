<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\Api\ViewModels\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\ViewModels\Domain\SubDomain\Impl\FunctionalEntityImpl;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityStub1 extends FunctionalEntityImpl
{
    const FIELD_1 = FunctionalEntityResponseStub1::FIELD_1;

    const FIELD_2 = FunctionalEntityResponseStub1::FIELD_2;

    const FIELD_3 = FunctionalEntityResponseStub1::FIELD_3;

    const FIELD_4 = FunctionalEntityResponseStub1::FIELD_4;
}