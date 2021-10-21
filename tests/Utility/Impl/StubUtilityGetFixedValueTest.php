<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility\Impl;

use Carbon\Carbon;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityContext;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityGetFixedValue;
use OpenClassrooms\CodeGenerator\Utility\Impl\StubUtilityGetRandomValue;
use OpenClassrooms\CodeGenerator\Utility\StubUtilityStrategy;
use PHPUnit\Framework\TestCase;

final class StubUtilityGetFixedValueTest extends TestCase
{
    private StubUtilityStrategy $stubUtilityContext;

    /**
     * @test
     * @dataProvider internalTypeAndInstanceDataProvider
     */
    public function createFixedFakeValueReturnData(string $type, string $fieldName, string $entityName, $expectedValue)
    {
        $this->stubUtilityContext = new StubUtilityContext(new StubUtilityGetFixedValue());
        $actual = $this->stubUtilityContext->createFakeValue($type, $fieldName, $entityName);
        $this->assertType($expectedValue, $actual);
    }

    private function assertType($expectedValue, $actual): void
    {
        if ($this->isValidDateFormat($actual)) {
            $this->assertInstanceOf(get_class($expectedValue), Carbon::parse($actual));
        } else {
            $this->{'assertIs' . $this->getInternalTypeFromValue($expectedValue)}($actual);
        }
    }

    /**
     * @param mixed $value
     */
    private function isValidDateFormat($value): bool
    {
        return is_string($value) && (preg_match("/\d{4}\-\d{2}-\d{2}/", $value));
    }

    /**
     * @param mixed
     */
    private function getInternalTypeFromValue($value): string
    {
        if ('integer' === gettype($value)) {
            return 'Int';
        }
        if ('double' === gettype($value)) {
            return 'Numeric';
        }
        if ('boolean' === gettype($value)) {
            return 'Bool';
        }

        return ucfirst(gettype($value));
    }

    /**
     * @test
     * @dataProvider internalTypeAndInstanceDataProvider
     */
    public function createFakeRandomValueReturnData(string $type, string $fieldName, string $entityName, $expectedValue)
    {
        $this->stubUtilityContext = new StubUtilityContext(new StubUtilityGetRandomValue());
        $actual = $this->stubUtilityContext->createFakeValue($type, $fieldName, $entityName);
        $this->assertType($expectedValue, $actual);
    }

    /**
     * @test
     */
    public function createFixedFakeValueThrowInvalidArgumentException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->stubUtilityContext = new StubUtilityContext(new StubUtilityGetFixedValue());
        $this->stubUtilityContext->createFakeValue('not exist', '', '');
    }

    /**
     * @test
     */
    public function createRandomFakeValueThrowInvalidArgumentException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->stubUtilityContext = new StubUtilityContext(new StubUtilityGetRandomValue());
        $this->stubUtilityContext->createFakeValue('not exist', '', '');
    }

    public function internalTypeAndInstanceDataProvider(): array
    {
        return [
            ['int', 'field1', 'FunctionalEntity', 1],
            ['float', 'field1', 'FunctionalEntity', 1.0],
            ['bool', 'field1', 'FunctionalEntity', true],
            ['string', 'field1', 'FunctionalEntity', 'value'],
            ['array', 'field1', 'FunctionalEntity', []],
            ['\DateTime', 'field1', 'FunctionalEntity', new \DateTime()],
            ['\DateTimeImmutable', 'field1', 'FunctionalEntity', new \DateTime()],
            ['\DateTimeInterface', 'field1', 'FunctionalEntity', new \DateTime()],
            ['Object', 'field1', 'FunctionalEntity', ''],
        ];
    }
}
