<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailStub;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelDetailStubFieldObjectStub5 extends StubFieldObject
{
    const CONST = 'FIELD_4';

    const INITIALISATION = 'new \DateTimeImmutable(Carbon::now()->toDateTimeString())';

    const NAME = 'field4';

    const OBJECT_NAMESPACE = "Carbon\Carbon";

    const VALUE = "'" . '2018-01-01' . "'";

    protected $const = self::CONST;

    protected $initialisation = self::INITIALISATION;

    protected $name = self::NAME;

    protected $objectNamespace = self::OBJECT_NAMESPACE;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
