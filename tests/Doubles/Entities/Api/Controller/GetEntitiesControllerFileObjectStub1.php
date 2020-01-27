<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class GetEntitiesControllerFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\GetFunctionalEntitiesController';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/Api/Controller/GetFunctionalEntitiesController.php';
        $this->className = self::CLASS_NAME;
    }
}
