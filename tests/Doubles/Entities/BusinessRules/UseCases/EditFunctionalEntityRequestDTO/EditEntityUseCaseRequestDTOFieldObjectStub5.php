<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditFunctionalEntityRequestDTO;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EditEntityUseCaseRequestDTOFieldObjectStub5 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var int
     */';

    const NAME = 'functionalEntityId';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
