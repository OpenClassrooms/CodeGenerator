<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class CreateEntityUseCaseRequestBuilderFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Requestors\Domain\SubDomain\CreateFunctionalEntityRequestBuilder';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Requestors/Domain/SubDomain/CreateFunctionalEntityRequestBuilder.php';
        $this->className = self::CLASS_NAME;
    }
}
