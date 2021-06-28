<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class PutEntityModelFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PutFunctionalEntityModel';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Api/Models/Domain/SubDomain/PutFunctionalEntityModel.php';
        $this->className = self::CLASS_NAME;
    }
}
