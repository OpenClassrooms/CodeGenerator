<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelAssemblerTrait;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;

class ViewModelAssemblerTraitFieldObjectStub1 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var int
     */';

    const NAME = 'id';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
