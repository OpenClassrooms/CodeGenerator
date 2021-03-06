<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\ViewModels\ViewModel;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class ViewModelFieldObjectStub3 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var string[]
     */';

    const NAME        = 'field2';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
