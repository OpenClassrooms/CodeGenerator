<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelListItemStub;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Tests\BusinessRules\Entities\EntityStub\EntityStubFieldObjectStub1;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class ViewModelListItemStubFieldObjectStub1 extends FieldObject
{
    const DOC_COMMENT = EntityStubFieldObjectStub1::DOC_COMMENT;

    const NAME = EntityStubFieldObjectStub1::NAME;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
        $this->value = new ConstObject(self::NAME);
    }
}
