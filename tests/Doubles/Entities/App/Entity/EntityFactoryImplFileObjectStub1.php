<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Entity;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class EntityFactoryImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityFactoryImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/App/Entity/Domain/SubDomain/FunctionalEntityFactoryImpl.php';
        $this->className = self::CLASS_NAME;
    }
}
