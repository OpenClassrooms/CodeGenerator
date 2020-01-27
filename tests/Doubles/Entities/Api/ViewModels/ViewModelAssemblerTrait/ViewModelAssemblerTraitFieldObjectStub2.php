<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModelAssemblerTrait;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class ViewModelAssemblerTraitFieldObjectStub2 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var string
     */';

    const NAME        = 'field1';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
