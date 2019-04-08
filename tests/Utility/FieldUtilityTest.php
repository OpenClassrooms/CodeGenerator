<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Entities\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\FileObject;
use OpenClassrooms\CodeGenerator\Utility\FieldUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class FieldUtilityTest extends TestCase
{
    /**
     * @var FileObject
     */
    private $fileObject;

    /**
     * @test
     */
    public function generateStubFieldObjects_ReturnFieldObject(): void
    {
        $fields = [
            $this->buildStubFieldObject('field1', 'string'),
            $this->buildStubFieldObject('field2', 'bool'),
            $this->buildStubFieldObject('field3', 'array'),
            $this->buildStubFieldObject('field4', '\DateTimeImmutable'),
        ];
        $actualFieldObjects = FieldUtility::generateStubFieldObjects($fields, $this->fileObject);

        $this->assertCount(count($fields), $actualFieldObjects);

        foreach ($fields as $key => $field){
            $this->assertEquals($field->getName(), $actualFieldObjects[$key]->getName());
            $this->assertEquals($field->getValue()->getName(), $actualFieldObjects[$key]->getValue()->getName());
        }
    }

    private function buildStubFieldObject(string $name, string $type)
    {
        $stubFieldObject = new FieldObject($name);
        $stubFieldObject->setDocComment(
            '/**
     * @var ' . $type . '
     */'
        );
        $stubFieldObject->setValue(new ConstObject($name));

        return $stubFieldObject;
    }

    public function generateStubFieldObjectsDataProvider()
    {
        return [
            [],
        ];
    }

    protected function setUp()
    {
        $this->fileObject = new FileObject();
        $this->fileObject->setClassName(self::class);
    }
}
