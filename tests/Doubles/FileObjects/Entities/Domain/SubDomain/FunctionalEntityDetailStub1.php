<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityDetailStub1 extends FunctionalEntity
{
    const FIELD4 = 'field4';

    const ID = 2;

    const SHORT_CLASS_NAME = 'FunctionalEntityDetail';

    protected $field4 = self::FIELD4;

    protected $id = self::ID;
}
