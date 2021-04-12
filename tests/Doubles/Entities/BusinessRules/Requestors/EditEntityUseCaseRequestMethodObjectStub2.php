<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

class EditEntityUseCaseRequestMethodObjectStub2 extends MethodObject
{
    public const DOC_COMMENT = null;

    public const NAME = 'isField2Updated';

    public const NULLABLE    = false;

    public const RETURN_TYPE = 'bool';

    public const VALUE       = null;

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
