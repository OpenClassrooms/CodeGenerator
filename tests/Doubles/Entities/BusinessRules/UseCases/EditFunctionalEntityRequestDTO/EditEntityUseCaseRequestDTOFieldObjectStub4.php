<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases\EditFunctionalEntityRequestDTO;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EditEntityUseCaseRequestDTOFieldObjectStub4 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var bool
     */';

    const NAME = 'field4Updated';

    const VALUE = 'false';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    protected $value = self::VALUE;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
