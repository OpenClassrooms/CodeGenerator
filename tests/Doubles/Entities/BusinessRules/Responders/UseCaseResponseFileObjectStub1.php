<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub1;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub4;

class UseCaseResponseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityResponse';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityResponse.php';
        $this->className = self::CLASS_NAME;
        $this->methods = [
            new EntityMethodObjectStub2(),
            new EntityMethodObjectStub3(),
            new EntityMethodObjectStub4(),
            new EntityMethodObjectStub1(),
        ];
    }
}
