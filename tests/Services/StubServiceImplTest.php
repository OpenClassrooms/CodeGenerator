<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Services;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;
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
     * @return FieldObject
     */
    private function createFieldObject($name, $type): FieldObject
    {
        $fieldObject = new FieldObject($name);
        $fieldObject->setDocComment(
            '/**
     * @var ' . $type . '
     */'
        );

        return $fieldObject;
    }

    /**
     * @test
     *
     * @dataProvider generateDataProvider
     */
    public function generateData_ReturnFieldObject($fieldObjectValues, $fileObject, $expectedValue): void
    {
        $actuals = $this->stubService->setFakeValues($fieldObjectValues, $fileObject);
        $actual = array_shift($actuals);

        $this->assertNotNull($actual->getValue());
        $this->assertEquals($expectedValue, $actual->getValue());

    }

    public function generateDataProvider(): array
    {
        $fileObject = new FileObject();
        $fileObject->setClassName(self::class);

        return [
            [[$this->createFieldObject('id', 'int')], $fileObject, StubServiceImpl::INT],
            [[$this->createFieldObject('field1', 'bool')], $fileObject, StubServiceImpl::BOOL],
            [[$this->createFieldObject('field2', 'string')], $fileObject, '\'Stub Service Impl Test Stub 1 field2\''],
            [[$this->createFieldObject('field3', 'string[]')], $fileObject, StubServiceImpl::ARRAY],
            [[$this->createFieldObject('field4', 'float')], $fileObject, StubServiceImpl::FLOAT],
            [[$this->createFieldObject('field4', 'array')], $fileObject, StubServiceImpl::ARRAY],
        ];
    }

    protected function setUp()
    {
        $this->stubService = new StubServiceImpl();
    }
}
