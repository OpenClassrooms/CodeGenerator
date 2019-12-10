<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub;

use Carbon\Carbon;
use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class EntityStubFieldObjectStub6 extends FieldObject
{
    const CONST       = 'UPDATED_AT';

    const DOC_COMMENT = '/**
     * @var \DateTimeInterface
     */';

    const NAME        = 'updatedAt';

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
