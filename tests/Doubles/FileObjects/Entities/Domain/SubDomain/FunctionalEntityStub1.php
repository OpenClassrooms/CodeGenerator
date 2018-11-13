<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity;
use phpDocumentor\Reflection\Types\Self_;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FunctionalEntityStub1 extends FunctionalEntity
{
    const FIELD1 = 'field1';

    const FIELD2 = 'field2';

    const FIELD3 = 'field3';

    const ID = 1;

    const SHORT_CLASS_NAME = 'FunctionalEntity';

    protected $field1 = self::FIELD1;

    protected $field2 = self::FIELD2;

    protected $field3 = self::FIELD3;

    protected $id = self::ID;
}
