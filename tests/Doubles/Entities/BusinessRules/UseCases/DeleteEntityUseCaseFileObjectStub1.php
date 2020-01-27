<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class DeleteEntityUseCaseFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\DeleteFunctionalEntity';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/DeleteFunctionalEntity.php';
        $this->className = self::CLASS_NAME;
    }
}
