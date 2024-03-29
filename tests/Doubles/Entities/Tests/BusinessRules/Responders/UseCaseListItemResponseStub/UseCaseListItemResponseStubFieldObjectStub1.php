<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFieldObjectStub1;

class UseCaseListItemResponseStubFieldObjectStub1 extends FieldObject
{
    public const DOC_COMMENT = EntityStubFieldObjectStub1::DOC_COMMENT;

    public const NAME = EntityStubFieldObjectStub1::NAME;

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected string $scope = FieldObject::SCOPE_PROTECTED;

    protected ?string $type = 'int';

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::NAME);
    }
}
