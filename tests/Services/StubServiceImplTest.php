<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Services;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
use OpenClassrooms\CodeGenerator\FileObjects\StubFieldObject;
use OpenClassrooms\CodeGenerator\Services\Impl\StubServiceImpl;
use OpenClassrooms\CodeGenerator\Services\StubService;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class StubServiceImplTest extends TestCase
{
    /**
     * @var StubService
     */
    private $stubService;

    /**
     * @test
     *
     * @dataProvider generateDataProvider
     */
    public function generateDataForNotInheritedFields_ReturnFieldObject(
        $fieldObjectValues,
        $fileObject,
        $expectedValue
    ): void
    {
        $actuals = $this->stubService->setNameAndStubValues($fieldObjectValues, $fileObject);
        $actual = array_shift($actuals);

        $this->assertNotNull($actual->getValue());
        $this->assertEquals($expectedValue, $actual->getValue());

    }

    /**
     * @test
     *
     * @dataProvider generateFakeDataProvider
     */
    public function generateDataForInheritedFields_ReturnFieldObject(
        $fieldObjectValues,
        $fileObject,
        $expectedValue
    ): void
    {
        $actuals = $this->stubService->setNameAndStubValues($fieldObjectValues, $fileObject);
        $actual = array_shift($actuals);

        $this->assertNotNull($actual->getValue());
        $this->assertEquals($expectedValue, $actual->getValue());

    }

    /**
     * @test
     * @expectedException  \InvalidArgumentException
     */
    public function generateFakeFieldValue_ThrowsException()
    {
        $fieldObject = $this->createStubFieldObject('test', 'Object', false);

        $this->stubService->setFakeValuesToFields([$fieldObject], new FileObject());
    }

    /**
     * @test
     *
     * @dataProvider generateDataProvider
     */
    public function generateFakeData_ReturnFieldObject($fieldObjectValues, $fileObject, $expectedValue): void
    {
        $actuals = $this->stubService->setFakeValuesToFields($fieldObjectValues, $fileObject);
        $actual = array_shift($actuals);

        $this->assertNotNull($actual->getValue());
        $this->assertEquals($expectedValue, $actual->getValue());

    }

    public function generateDataProvider(): array
    {
        $fileObject = new FileObject();
        $fileObject->setClassName(self::class);

        $field3Value = "['Stub Service Impl Test Stub 1 field 3 1', 'Stub Service Impl Test Stub 1 field 3 2']";
        $field5Value = "['Stub Service Impl Test Stub 1 field 5 1', 'Stub Service Impl Test Stub 1 field 5 2']";

        return [
            [[$this->createStubFieldObject('id', 'int', false)], $fileObject, StubServiceImpl::INT],
            [[$this->createStubFieldObject('field1', 'bool', false)], $fileObject, StubServiceImpl::BOOL],
            [
                [$this->createStubFieldObject('field2', 'string', false)],
                $fileObject,
                '\'Stub Service Impl Test Stub 1 field 2\'',
            ],
            [[$this->createStubFieldObject('field3', 'string[]', false)], $fileObject, $field3Value],
            [[$this->createStubFieldObject('field4', 'float', false)], $fileObject, StubServiceImpl::FLOAT],
            [[$this->createStubFieldObject('field5', 'array', false)], $fileObject, $field5Value],
            [
                [$this->createStubFieldObject('field6', '\DateTimeImmutable', false)],
                $fileObject,
                "'" . date('Y') . '-01-01' . "'",
            ],
        ];
    }

    /**
     * @return FieldObject
     */
    private function createStubFieldObject($name, $type, $inherited): FieldObject
    {
        $stubFieldObject = new StubFieldObject($name);
        $stubFieldObject->setDocComment(
            '/**
     * @var ' . $type . '
     */'
        );

        $stubFieldObject->setInherited($inherited);

        return $stubFieldObject;
    }

    public function generateFakeDataProvider(): array
    {
        $fileObject = new FileObject();
        $fileObject->setClassName(self::class);

        $id = 'StubServiceImplTestResponseStub1::ID';
        $field1 = 'StubServiceImplTestResponseStub1::FIELD_1';
        $field2 = 'StubServiceImplTestResponseStub1::FIELD_2';
        $field3 = 'StubServiceImplTestResponseStub1::FIELD_3';
        $field4 = 'StubServiceImplTestResponseStub1::FIELD_4';
        $field5 = 'StubServiceImplTestResponseStub1::FIELD_5';
        $field6 = 'StubServiceImplTestResponseStub1::FIELD_6';

        return [
            [[$this->createStubFieldObject('id', 'int', true)], $fileObject, $id],
            [[$this->createStubFieldObject('field1', 'bool', true)], $fileObject, $field1],
            [[$this->createStubFieldObject('field2', 'string', true)], $fileObject, $field2],
            [[$this->createStubFieldObject('field3', 'string[]', true)], $fileObject, $field3],
            [[$this->createStubFieldObject('field4', 'float', true)], $fileObject, $field4],
            [[$this->createStubFieldObject('field5', 'array', true)], $fileObject, $field5],
            [[$this->createStubFieldObject('field6', '\DateTimeImmutable', true)], $fileObject, $field6],
        ];
    }

    protected function setUp()
    {
        $this->stubService = new StubServiceImpl();
    }
}
