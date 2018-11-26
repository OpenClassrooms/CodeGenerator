<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

class EntityStubFieldObjectStub3 extends StubFieldObject
{
    const CONST = 'FIELD_2';

    const NAME = 'field2';

    const VALUE = '[\'Functional Entity Stub 1 field 2 1\', \'Functional Entity Stub 1 field 2 2\']';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = StubFieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
