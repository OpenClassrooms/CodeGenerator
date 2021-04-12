<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CreateEntityUseCaseTestFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain\CreateFunctionalEntityTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/BusinessRules/UseCases/Domain/SubDomain/CreateFunctionalEntityTest.php';
        $this->className = self::CLASS_NAME;
    }
}
