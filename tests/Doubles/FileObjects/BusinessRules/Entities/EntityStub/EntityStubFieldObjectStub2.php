<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

class EntityStubFieldObjectStub2 extends StubFieldObject
{
    const CONST = 'FIELD_1';

    const NAME = 'field1';

    const VALUE = '\'Functional Entity Stub 1 field 1\'';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = StubFieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
