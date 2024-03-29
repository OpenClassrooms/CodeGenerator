<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class GetEntitiesControllerFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\Domain\SubDomain\GetFunctionalEntitiesController';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Api/Controller/Domain/SubDomain/GetFunctionalEntitiesController.php';
        $this->className = self::CLASS_NAME;
    }
}
