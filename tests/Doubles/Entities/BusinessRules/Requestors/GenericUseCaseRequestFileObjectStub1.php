<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Requestors;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\UseCases\Domain\SubDomain\Request\GenericUseCaseRequest;

final class GenericUseCaseRequestFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = GenericUseCaseRequest::class;

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/UseCases/Domain/SubDomain/Request/GenericUseCaseRequest.php';
        $this->className = self::CLASS_NAME;
    }
}
