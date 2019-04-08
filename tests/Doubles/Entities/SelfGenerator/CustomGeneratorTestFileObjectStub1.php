<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\SelfGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class CustomGeneratorTestFileObjectStub1 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Fixtures\Classes\Tests\Generator\SelfGenerator\CustomGeneratorTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/tests/Generator/SelfGenerator/CustomGeneratorTest.php';
        $this->className = self::CLASS_NAME;
    }
}
