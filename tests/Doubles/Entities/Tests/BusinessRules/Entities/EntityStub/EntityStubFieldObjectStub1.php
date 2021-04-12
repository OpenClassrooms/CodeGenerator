<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class EntityStubFieldObjectStub1 extends FieldObject
{
    private const CONST = 'ID';

    public const DOC_COMMENT = null;

    public const NAME = 'id';

    private const VALUE = 1;

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected string $scope = FieldObject::SCOPE_PROTECTED;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::CONST);
        $this->value->setValue(self::VALUE);
    }
}
