<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class PatchEntityControllerFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Controller\PatchFunctionalEntityController';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/Api/Controller/PatchFunctionalEntityController.php';
        $this->className = self::CLASS_NAME;
    }
}
