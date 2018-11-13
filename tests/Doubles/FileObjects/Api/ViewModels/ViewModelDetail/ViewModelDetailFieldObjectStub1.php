<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetail;

use OpenClassrooms\CodeGenerator\ClassObjects\FieldObject;

class ViewModelDetailFieldObjectStub1 extends FieldObject
{
    const ACCESSOR = 'getField4';

    const DOC_COMMENT = '/**
     * @var \DateTime
     */';

    const NAME = 'field4';

    protected $accessor = self::ACCESSOR;

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
