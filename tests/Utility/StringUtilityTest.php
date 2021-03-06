<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;
use PHPUnit\Framework\TestCase;

class StringUtilityTest extends TestCase
{
    /**
     * @var StringUtility
     */
    private $stringUtility;

    public function camelCaseToSpacedProvider(): array
    {
        return [
            [new FieldObject('test1'), 'test 1'],
            [new FieldObject('testAlpha'), 'test Alpha'],
            [new FieldObject('testAlphaBeta'), 'test Alpha Beta'],
            [new FieldObject('testAlphaBetaGama'), 'test Alpha Beta Gama'],
        ];
    }

    public function camelCaseToUpperSnakeCaseProvider(): array
    {
        return [
            [new FieldObject('test1'), 'TEST_1'],
            [new FieldObject('testAlpha'), 'TEST_ALPHA'],
            [new FieldObject('testAlphaBeta'), 'TEST_ALPHA_BETA'],
            [new FieldObject('testAlphaBetaGama'), 'TEST_ALPHA_BETA_GAMA'],
        ];
    }

    /**
     * @test
     * @dataProvider camelCaseToSpacedProvider
     */
    public function convertFieldNameToSpacedString_ReturnString(FieldObject $actualFileObject, $expectedValue): void
    {
        $actualSpaced = $this->stringUtility->convertToSpacedString($actualFileObject->getName());

        $this->assertEquals($expectedValue, $actualSpaced);
    }

    /**
     * @test
     * @dataProvider camelCaseToUpperSnakeCaseProvider
     */
    public function convertFieldNameToUpperSnakeCase_ReturnString(FieldObject $actualFileObject, $expectedValue): void
    {
        $actualUpperSnakeCase = $this->stringUtility->convertToUpperSnakeCase($actualFileObject->getName());

        $this->assertEquals($expectedValue, $actualUpperSnakeCase);
    }

    protected function setUp(): void
    {
        $this->stringUtility = new StringUtility();
    }
}
