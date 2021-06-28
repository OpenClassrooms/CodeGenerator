<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Responders\UseCaseListItemResponseStub;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class UseCaseListItemResponseStubFileObjectStub2 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseStub2';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityListItemResponseStub2.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new UseCaseListItemResponseStubFieldObjectStub1(),
            new UseCaseListItemResponseStubFieldObjectStub2(),
            new UseCaseListItemResponseStubFieldObjectStub3(),
            new UseCaseListItemResponseStubFieldObjectStub4(),
        ];
    }
}
