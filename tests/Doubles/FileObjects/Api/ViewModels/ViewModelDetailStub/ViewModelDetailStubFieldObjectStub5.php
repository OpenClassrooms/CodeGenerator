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

    const NAME = 'field4';

    const VALUE = 'FunctionalEntityDetailResponseStub1::FIELD_4';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}