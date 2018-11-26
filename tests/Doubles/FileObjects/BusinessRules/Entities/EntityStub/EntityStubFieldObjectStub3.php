<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelStub;

use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

class ViewModelStubFieldObjectStub3 extends StubFieldObject
{
    const CONST = 'FIELD_2';

    const NAME = 'field2';

    const VALUE = 'FunctionalEntityResponseStub1::FIELD_2';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = StubFieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
