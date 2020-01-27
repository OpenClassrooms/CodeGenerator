<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class PostEntityModelFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\PostFunctionalEntityModel';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/Api/Models/Domain/SubDomain/PostFunctionalEntityModel.php';
        $this->className = self::CLASS_NAME;
    }
}
