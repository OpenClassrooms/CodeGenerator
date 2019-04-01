<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Entities\EntityStub;

use Carbon\Carbon;
use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\FieldObject;

class EntityStubFieldObjectStub5 extends FieldObject
{
    const CONST = 'FIELD_4';

    const DOC_COMMENT = '/**
     * @var \DateTimeImmutable
     */';

    const NAME = 'field4';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PROTECTED;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::CONST);
        $this->value->setValue(Carbon::parse('first day of January 2018')->toDateString());
    }
}
