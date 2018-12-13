<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;

class EntityStubFieldObjectStub5 extends FieldObject
{
    const CONST = 'FIELD_4';

    const DOC_COMMENT = '/**
     * @var \DateTimeImmutable
     */';

    const NAME = 'field4';

    const VALUE = '2018-01-01';

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
