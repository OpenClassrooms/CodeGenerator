<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

class EntityMethodObjectStub3 extends MethodObject
{
    public const DOC_COMMENT = '/**
     * @return string[]
     */';

    public const NAME = 'getField2';

    private const NULLABLE    = false;

    private const RETURN_TYPE = 'array';

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected bool $nullable = self::NULLABLE;

    protected string $returnType = self::RETURN_TYPE;

    protected string $scope = FieldObject::SCOPE_PROTECTED;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
