<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\Doubles\BusinessRules\Responders;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class UseCaseListItemResponseTestCaseFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\BusinessRules\Responders\Domain\SubDomain\FunctionalEntityListItemResponseTestCase';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Tests/Doubles/BusinessRules/Responders/Domain/SubDomain/FunctionalEntityListItemResponseTestCase.php';
        $this->className = self::CLASS_NAME;
    }
}
