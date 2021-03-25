<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;
use OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain\GetFunctionalEntityController;

class GetEntityControllerFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = GetFunctionalEntityController::class;

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Api/Controller/Domain/SubDomain/GetFunctionalEntityController.php';
        $this->className = self::CLASS_NAME;
    }
}
