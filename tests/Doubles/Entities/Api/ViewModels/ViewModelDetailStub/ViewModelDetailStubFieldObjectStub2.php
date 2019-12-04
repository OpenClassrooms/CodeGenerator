<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelDetailStub;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub\EntityStubFieldObjectStub2;

class ViewModelDetailStubFieldObjectStub2 extends FieldObject
{
    const DOC_COMMENT = EntityStubFieldObjectStub2::DOC_COMMENT;

    const NAME = EntityStubFieldObjectStub2::NAME;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::NAME);
    }
}
