<?php

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\tests\Doubles\OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Entity\Domain\SubDomain\FunctionalEntityImpl;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FunctionalEntityStub1 extends FunctionalEntityImpl
{
    const ID = 1223;

    const FIELD1 = '';

    const FIELD2 = [];

    const FIELD3 = '';

    const FIELD4 = '';

    protected $id = self::ID;

    protected $field1 = self::FIELD1;

    protected $field2 = self::FIELD2;

    protected $field3 = self::FIELD3;

    protected $field4 = self::FIELD4;
}
