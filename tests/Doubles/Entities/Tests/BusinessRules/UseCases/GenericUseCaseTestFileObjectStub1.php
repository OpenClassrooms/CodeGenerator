<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Tests\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\BusinessRules\UseCases\Domain\SubDomain\GenericUseCaseTest;

final class GenericUseCaseTestFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = GenericUseCaseTest::class;

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/Tests/BusinessRules/UseCases/Domain/SubDomain/GenericUseCaseTest.php';
        $this->className = self::CLASS_NAME;
    }
}
