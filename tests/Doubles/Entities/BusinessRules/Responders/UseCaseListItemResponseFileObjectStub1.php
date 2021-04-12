<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class UseCaseListItemResponseFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponse';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityListItemResponse.php';
        $this->className = self::CLASS_NAME;
    }
}
