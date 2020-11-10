<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\GenericUseCase;

final class GenericUseCaseFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = GenericUseCase::class;

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/GenericUseCase.php';
        $this->className = self::CLASS_NAME;
    }
}
