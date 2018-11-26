<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

class EntityStubFieldObjectStub4 extends StubFieldObject
{
    const CONST = 'FIELD_3';

    const NAME = 'field3';

    const VALUE = 'true';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = StubFieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
