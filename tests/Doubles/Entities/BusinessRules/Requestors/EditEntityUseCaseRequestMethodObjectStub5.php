<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EditEntityUseCaseRequestMethodObjectStub5 extends MethodObject
{
    const DOC_COMMENT = null;

    const NAME = 'getFunctionalEntityId';

    const NULLABLE = false;

    const RETURN_TYPE = 'int';

    const VALUE = null;

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
