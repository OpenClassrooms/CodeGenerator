<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityStub1 extends FunctionalEntity
{
    const FIELD_1 = 'Functional Entity Stub 1 field1';

    const FIELD_2 = 'field2';

    const FIELD_3 = 'field3';

    const ID = 1;

    const SHORT_CLASS_NAME = 'FunctionalEntity';

    protected $field1 = self::FIELD_1;

    protected $field2 = self::FIELD_2;

    protected $field3 = self::FIELD_3;

    protected $id = self::ID;
}
