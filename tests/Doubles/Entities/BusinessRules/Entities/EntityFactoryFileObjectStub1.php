<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\BusinessRules\Entities;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class EntityFactoryFileObjectStub1 extends FileObject
{
    private const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityFactory';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/BusinessRules/Entities/Domain/SubDomain/FunctionalEntityFactory.php';

        parent::__construct(self::CLASS_NAME);
    }
}
