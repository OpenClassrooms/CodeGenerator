<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Services\Impl;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;
use OpenClassrooms\CodeGenerator\Services\Impl\TemplatingServiceImpl;
use OpenClassrooms\CodeGenerator\Services\TemplatingService;
use OpenClassrooms\CodeGenerator\Tests\TestClassUtil;
use PHPUnit\Framework\TestCase;

class TemplatingServiceImplTest extends TestCase
{
    /**
     * @var TemplatingService
     */
    private $templateServiceImpl;

    /**
     * @test
     */
    public function getSortAccessorsFieldNameByAlphaFilterReturnArrayOfFields(): void
    {
        $methodObjects = [
            new MethodObject('getField4'),
            new MethodObject('getField2'),
            new MethodObject('getField1'),
            new MethodObject('isField3'),
        ];

        $expectedOrder = [
            'getField1',
            'getField2',
            'isField3',
            'getField4',
        ];

        $twigFilter = TestClassUtil::invokeMethod('getSortAccessorsFieldNameByAlphaFilter', $this->templateServiceImpl);

        $this->assertTrue(is_callable($twigFilter->getCallable()));

        $actualMethodObjects = $twigFilter->getCallable()->__invoke($methodObjects);

        foreach ($actualMethodObjects as $key => $actualMethodObject) {
            /** @var MethodObject $actualMethodObject */
            $this->assertSame($actualMethodObject->getName(), $expectedOrder[$key]);
        }
    }

    /**
     * @test
     */
    public function getSortIdFirstFilterReturnArrayOfFields(): void
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

    private function generateFieldObject(string $name, string $type): FieldObject
    {
        $fieldObject = new FieldObject($name, $type);
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
    private function getFieldNameList(array $fieldObjects): array
    {
        $fieldNames = [];
        foreach ($fieldObjects as $fieldObject) {
            $fieldNames[] = $fieldObject->getName();
        }

        return $fieldNames;
    }

    /**
     * @test
     */
    public function getSortNameByAlphaFilterReturnArrayOfFields(): void
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
    public function lineBreakReturnTrue(): void
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

    public function printValueProvider(): array
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
     * @dataProvider printValueProvider
     */
    public function printValueReturnValue($value, $expected): void
    {
        $twigFunction = TestClassUtil::invokeMethod('printValue', $this->templateServiceImpl);

        $this->assertTrue(is_callable($twigFunction->getCallable()));

        $actualValue = $twigFunction->getCallable()->__invoke($value);

        $this->assertEquals($actualValue, $expected);
    }

    protected function setUp(): void
    {
        $this->templateServiceImpl = new  TemplatingServiceImpl('');
    }
}
