<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModel;

use OpenClassrooms\CodeGenerator\ClassObjects\FieldObject;

class ViewModelFieldObjectStub4 extends FieldObject
{
    const ACCESSOR = 'isField3';

    const DOC_COMMENT = '/**
     * @var bool
     */';

    const NAME = 'field3';

    protected $accessor = self::ACCESSOR;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
