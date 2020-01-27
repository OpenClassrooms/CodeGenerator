<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class EntityStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Entities/Domain/SubDomain/FunctionalEntityStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new EntityStubFieldObjectStub2(),
            new EntityStubFieldObjectStub3(),
            new EntityStubFieldObjectStub4(),
            new EntityStubFieldObjectStub5(),
            new EntityStubFieldObjectStub1(),
            new EntityStubFieldObjectStub6(),
        ];
    }
}
