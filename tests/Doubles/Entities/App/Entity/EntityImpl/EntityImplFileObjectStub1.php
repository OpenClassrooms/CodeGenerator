<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\App\Entity\EntityImpl;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityImplFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\App\Entity\Domain\SubDomain\FunctionalEntityImpl';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/App/Entity/Domain/SubDomain/FunctionalEntityImpl.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [];
    }
}
