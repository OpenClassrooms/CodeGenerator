<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\BusinessRules\Entities\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub4;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub5;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityFieldObjectStub6;

class EntityFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntity';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/BusinessRules/Entities/Domain/SubDomain/FunctionalEntity.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new EntityFieldObjectStub1(),
            new EntityFieldObjectStub2(),
            new EntityFieldObjectStub3(),
            new EntityFieldObjectStub4(),
            new EntityFieldObjectStub5(),
            new EntityFieldObjectStub6(),
        ];
    }
}
