<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\UseCases;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\Request\CreateFunctionalEntityRequest;

class CreateEntityUseCaseRequestFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = CreateFunctionalEntityRequest::class;

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/Request/CreateFunctionalEntityRequest.php';
        $this->className = self::CLASS_NAME;
    }
}
