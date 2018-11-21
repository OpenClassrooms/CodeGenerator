<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemStub;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubFieldObjectStub3 extends StubFieldObject
{
    const CONST = 'FIELD_2';

    const NAME = 'field2';

    const VALUE = 'FunctionalEntityListItemResponseStub1::FIELD_2';

    protected $const = self::CONST;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
