<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelStub;

use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

class ViewModelStubFieldObjectStub1 extends StubFieldObject
{
    const CONST = 'ID';

    const NAME = 'id';

    const VALUE = 'FunctionalEntityResponseStub1::ID';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = StubFieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
