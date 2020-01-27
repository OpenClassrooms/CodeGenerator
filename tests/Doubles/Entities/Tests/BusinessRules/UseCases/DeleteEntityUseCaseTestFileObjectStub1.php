<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class DeleteEntityUseCaseTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain\DeleteFunctionalEntityTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/BusinessRules/UseCases/Domain/SubDomain/DeleteFunctionalEntityTest.php';
        $this->className = self::CLASS_NAME;
    }
}
