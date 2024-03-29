<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

class EntityMethodObjectStub1 extends MethodObject
{
    public const DOC_COMMENT = null;

    public const NAME = 'getId';

    private const NULLABLE = false;

    private const RETURN_TYPE = 'int';

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected bool $nullable = self::NULLABLE;

    protected string $returnType = self::RETURN_TYPE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
