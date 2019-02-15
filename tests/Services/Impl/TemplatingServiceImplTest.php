<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Services\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class TemplatingServiceImplTest extends TestCase
{
    /**
     * @var TemplatingService
     */
    private $templateServiceImpl;

    /**
     * @test
     */
    public function getSortNameByAlphaFilter_ReturnArrayOfFields()
    {
        $fieldObjects = [
            $this->generateFieldObject('omega', 'bool'),
            $this->generateFieldObject('beta', 'int'),
            $this->generateFieldObject('alpha', 'string'),
        ];
        $expectedFieldNames = $this->getFieldNameList($fieldObjects);
        sort($expectedFieldNames);

        $twigFilter = TestClassUtil::invokeMethod('getSortNameByAlphaFilter', $this->templateServiceImpl);

        $this->assertTrue(is_callable($twigFilter->getCallable()));

        $actualFieldObjects = $twigFilter->getCallable()->__invoke($fieldObjects);
        $actualFieldNames = $this->getFieldNameList($actualFieldObjects);

        $this->assertFieldNames($expectedFieldNames, $actualFieldNames);

    }

    private function generateFieldObject(string $name, string $type)
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
     * @param FieldObject[]
     */
    private function getFieldNameList(array $fieldObjects)
    {
        $fieldNames = [];
        foreach ($fieldObjects as $fieldObject) {
            $fieldNames[] = $fieldObject->getName();
        }

        return $fieldNames;
    }

    /**
     * @param string[] $expectedFieldNames
     * @param string[] $actualFieldNames
     */
    private function assertFieldNames(array $expectedFieldNames, array $actualFieldNames): void
    {
        foreach ($actualFieldNames as $key => $actualFieldName) {
            $this->assertEquals($actualFieldName, $expectedFieldNames[$key]);
        }
    }

    /**
     * @test
     */
    public function getSortIdFirstFilter_ReturnArrayOfFields()
    {
        $fieldObjects = [
            $this->generateFieldObject('omega', 'bool'),
            $this->generateFieldObject('beta', 'int'),
            $this->generateFieldObject('alpha', 'string'),
            $this->generateFieldObject('id', 'int'),
        ];
        $expectedFieldNames = $this->getFieldNameList($fieldObjects);
        $expectedField = end($expectedFieldNames);

        $twigFilter = TestClassUtil::invokeMethod('getSortIdFirstFilter', $this->templateServiceImpl);

        $this->assertTrue(is_callable($twigFilter->getCallable()));

        $actualFieldObjects = $twigFilter->getCallable()->__invoke($fieldObjects);
        $actualField = array_shift($actualFieldObjects);

        $this->assertEquals($actualField->getName(), $expectedField);
    }

    /**
     * @test
     * @dataProvider printValueProvider
     */
    public function printValue_ReturnValue($value, $expected)
    {
        $twigFunction = TestClassUtil::invokeMethod('printValue', $this->templateServiceImpl);

        $this->assertTrue(is_callable($twigFunction->getCallable()));

        $actualValue = $twigFunction->getCallable()->__invoke($value);

        $this->assertEquals($actualValue, $expected);
    }

    public function printValueProvider()
    {
        return [
            [true, 'true'],
            [['test', 'test2'], '[\'test\', \'test2\']'],
            ['2018-01-01', '\'2018-01-01\''],
            ['test', 'test'],
        ];
    }

    /**
     * @test
     */
    public function lineBreak_ReturnTrue()
    {
        $fieldObjects = [
            $this->generateFieldObject('id', 'int'),
            $this->generateFieldObject('omega', 'bool'),
            $this->generateFieldObject('beta', 'int'),
            $this->generateFieldObject('alpha', 'Object'),
        ];
        $twigFunction = TestClassUtil::invokeMethod('lineBreak', $this->templateServiceImpl);

        $this->assertTrue(is_callable($twigFunction->getCallable()));

        $actualValue = $twigFunction->getCallable()->__invoke($fieldObjects, 1);

        $this->assertTrue($actualValue);
    }

    protected function setUp()
    {
        $this->templateServiceImpl = new  TemplatingServiceImpl('', 'author', 'mail');
    }
}
