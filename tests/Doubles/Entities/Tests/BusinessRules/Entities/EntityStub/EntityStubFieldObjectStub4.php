<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class EntityStubFieldObjectStub4 extends FieldObject
{
    const CONST = 'FIELD_3';

    const DOC_COMMENT = '/**
     * @var bool
     */';

    const NAME  = 'field3';

    const VALUE = true;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PROTECTED;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::CONST);
        $this->value->setValue(self::VALUE);
    }
}
