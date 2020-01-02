<?php

// Auto Generated by OpenClassrooms Code Generator

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityImpl;

class FunctionalEntityStub2 extends FunctionalEntityImpl
{
    const FIELD_1 = 'Functional Entity Stub 2 field 1';

    const FIELD_2 = ['Functional Entity Stub 2 field 2 1', 'Functional Entity Stub 2 field 2 2'];

    const FIELD_3 = true;

    const FIELD_4 = '2018-01-01';

    const ID = 2;

    const UPDATED_AT = '2018-01-01';

    protected $field1 = self::FIELD_1;

    protected $field2 = self::FIELD_2;

    protected $field3 = self::FIELD_3;

    protected $id = self::ID;

    protected $updatedAt = self::UPDATED_AT;

    public function __construct()
    {
        $this->field4 = new \DateTimeImmutable(self::FIELD_4);
        $this->updatedAt = new \DateTimeImmutable(self::UPDATED_AT);
    }
}
