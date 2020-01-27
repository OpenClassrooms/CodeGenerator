<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Gateways;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class EntityNotFoundExceptionFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Gateways\Domain\SubDomain\Exceptions\FunctionalEntityNotFoundException';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Gateways/Domain/SubDomain/Exceptions/FunctionalEntityNotFoundException.php';
        $this->className = self::CLASS_NAME;
    }
}
