<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

class EntityMethodObjectStub4 extends MethodObject
{
    const DOC_COMMENT = null;

    const NAME        = 'isField3';

    const NULLABLE    = false;

    const RETURN_TYPE = 'bool';

    const VALUE       = null;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $nullable = self::NULLABLE;

    protected $returnType = self::RETURN_TYPE;

    protected $scope = FieldObject::SCOPE_PROTECTED;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
