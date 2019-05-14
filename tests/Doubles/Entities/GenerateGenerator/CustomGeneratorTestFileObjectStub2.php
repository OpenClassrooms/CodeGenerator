<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\Entities\GenerateGenerator;

use OpenClassrooms\CodeGenerator\Entities\FileObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class CustomGeneratorTestFileObjectStub2 extends FileObject
{
    const CLASS_NAME = 'OpenClassrooms\CodeGenerator\Tests\Generator\GenerateGenerator\CustomGeneratorTest';

    public function __construct()
    {
        $this->content = __DIR__ . '/../../../Fixtures/Classes/Tests/Generator/GenerateGenerator/BuilderPattern/CustomGeneratorTest.php';
        $this->className = self::CLASS_NAME;
    }
}
