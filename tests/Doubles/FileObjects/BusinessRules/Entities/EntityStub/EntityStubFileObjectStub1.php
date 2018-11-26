<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\FileObjects\BusinessRules\Entities\EntityStub;

use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class EntityStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\tests\Doubles\BusinessRules\Entities\Domain\SubDomain\FunctionalEntityStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../../../Fixtures/Classes/tests/Doubles/BusinessRules/Entities/Domain/SubDomain/FunctionalEntityStub1.php';
        $this->className = self::CLASS_NAME;
        $this->fields = [
            new EntityStubFieldObjectStub2(),
            new EntityStubFieldObjectStub3(),
            new EntityStubFieldObjectStub4(),
            new EntityStubFieldObjectStub1(),
        ];
    }
}
