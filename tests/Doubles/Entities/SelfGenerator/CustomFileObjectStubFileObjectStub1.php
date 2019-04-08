<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class CustomFileObjectStubFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Doubles\Entities\SelfGenerator\CustomFileObjectStub1';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/tests/Doubles/Entities/SelfGenerator/CustomFileObjectStub1.php';
        $this->className = self::CLASS_NAME;
    }
}
