<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFieldObjectStub3;

class UseCaseListItemResponseStubFieldObjectStub3 extends FieldObject
{
    public const DOC_COMMENT = EntityStubFieldObjectStub3::DOC_COMMENT;

    public const NAME = EntityStubFieldObjectStub3::NAME;

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected string $scope = FieldObject::SCOPE_PROTECTED;

    protected ?string $type = 'array';

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::NAME);
    }
}
