<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\FieldObject;

class EntityStubFieldObjectStub1 extends FieldObject
{
    const CONST = 'ID';

    const DOC_COMMENT = '/**
     * @var int
     */';

    const NAME = 'id';

    const VALUE = 1;

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
