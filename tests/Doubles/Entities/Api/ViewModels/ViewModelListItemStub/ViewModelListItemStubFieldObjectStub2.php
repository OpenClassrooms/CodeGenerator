<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelListItemStub;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFieldObjectStub2;

class ViewModelListItemStubFieldObjectStub2 extends FieldObject
{
    public const DOC_COMMENT = EntityStubFieldObjectStub2::DOC_COMMENT;

    public const NAME = EntityStubFieldObjectStub2::NAME;

    protected ?string $docComment = self::DOC_COMMENT;

    protected string $name = self::NAME;

    protected string $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::NAME);
    }
}
