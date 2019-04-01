<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\Api\ViewModels\ViewModelDetailAssemblerImpl;

use OpenClassrooms\CodeGenerator\Entities\FieldObject;

class ViewModelDetailAssemblerImplFieldObjectStub1 extends FieldObject
{
    const DOC_COMMENT = '/**
     * @var \DateTimeImmutable
     */';

    const NAME = 'field4';

    protected $docComment = self::DOC_COMMENT;

    protected $name = self::NAME;

    protected $scope = FieldObject::SCOPE_PUBLIC;

    public function __construct()
    {
        parent::__construct($this->name);
    }
}
