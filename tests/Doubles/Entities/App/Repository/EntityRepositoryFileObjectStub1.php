<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Repository;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class EntityRepositoryFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Repository\Domain\SubDomain\FunctionalEntityRepository';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../Fixtures/Classes/App/Repository/Domain/SubDomain/FunctionalEntityRepository.php';
        $this->className = self::CLASS_NAME;
    }
}
