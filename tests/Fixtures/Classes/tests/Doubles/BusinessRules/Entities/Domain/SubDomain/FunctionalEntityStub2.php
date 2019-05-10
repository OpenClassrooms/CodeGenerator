<?php declare(strict_types=1);
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityImpl;

/**
 * @author authorStub <author.stub@example.com>
 */
class FunctionalEntityStub2 extends FunctionalEntityImpl
{
    const FIELD_1 = 'Functional Entity Stub 2 field 1';

    const FIELD_2 = ['Functional Entity Stub 2 field 2 1', 'Functional Entity Stub 2 field 2 2'];

    const FIELD_3 = true;

    const FIELD_4 = '2018-01-01';

    const ID = 2;

    protected $field1 = self::FIELD_1;

    protected $field2 = self::FIELD_2;

    protected $field3 = self::FIELD_3;

    protected $id = self::ID;

    public function __construct()
    {
        $this->field4 = new \DateTimeImmutable(self::FIELD_4);
    }
}
