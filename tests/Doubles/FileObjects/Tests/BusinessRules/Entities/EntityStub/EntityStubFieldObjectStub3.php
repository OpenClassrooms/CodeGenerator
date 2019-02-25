<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;

class EntityStubFieldObjectStub3 extends FieldObject
{
    const CONST = 'FIELD_2';

    const DOC_COMMENT = '/**
     * @var string[]
     */';

    const NAME = 'field2';

    const VALUE = ['Functional Entity Stub 1 field 2 1', 'Functional Entity Stub 1 field 2 2'];

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PROTECTED;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::CONST);
        $this->value->setValue(self::VALUE);
    }
}
