<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub2;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub3;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub4;
use OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities\EntityMethodObjectStub5;

class EditEntityUseCaseRequestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\EditFunctionalEntityRequest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Requestors/Domain/SubDomain/EditFunctionalEntityRequest.php';
        $this->className = self::CLASS_NAME;
        $this->methods = [
            new EntityMethodObjectStub2(),
            new EntityMethodObjectStub3(),
            new EntityMethodObjectStub4(),
            new EntityMethodObjectStub5(),
            new EditEntityUseCaseRequestMethodObjectStub1(),
            new EditEntityUseCaseRequestMethodObjectStub2(),
            new EditEntityUseCaseRequestMethodObjectStub3(),
            new EditEntityUseCaseRequestMethodObjectStub4(),
            new EditEntityUseCaseRequestMethodObjectStub5(),
        ];
    }
}
