<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Responders\UseCaseListItemResponseStub;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Entities\EntityStub\EntityStubFieldObjectStub3;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class UseCaseListItemResponseStubFieldObjectStub3 extends FieldObject
{
    const DOC_COMMENT = EntityStubFieldObjectStub3::DOC_COMMENT;

    const NAME = EntityStubFieldObjectStub3::NAME;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::NAME);
    }
}
