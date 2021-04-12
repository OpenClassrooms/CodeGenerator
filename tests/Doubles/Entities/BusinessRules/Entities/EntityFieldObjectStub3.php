<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class EntityFieldObjectStub3 extends FieldObject
{
    public const DOC_COMMENT = '/**
     * @var string[]
     */';

    public const NAME = 'field2';

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected string $scope = FieldObject::SCOPE_PROTECTED;

    protected ?string $type = 'array';

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
