<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\Api\Models\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class EntityModelTraitFileObjectStub1 extends FileObject
{
    public const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Api\Models\Domain\SubDomain\FunctionalEntityModelTrait';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../../Fixtures/Classes/Api/Models/Domain/SubDomain/FunctionalEntityModelTrait.php';
        $this->className = self::CLASS_NAME;
    }
}
