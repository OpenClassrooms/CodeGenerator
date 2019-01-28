<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests\Utility;

use Carbon\Carbon;
use OpenClassrooms\CodeGenerator\Utility\StubUtility;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class StubUtilityTest extends TestCase
{
    /**
     * @test
     * @dataProvider internalTypeAndInstanceDataProvider
     */
    public function createFakeValue_ReturnData(string $type, string $fieldName, string $entityName, $expectedValue)
    {
        $actual = StubUtility::createFakeValue($type, $fieldName, $entityName);
        $this->assertType($expectedValue, $actual);
    }

    private function assertType($expectedValue, $actual): void
    {
        if ($this->isValidDateFormat($actual)) {
            $this->assertInstanceOf(get_class($expectedValue), Carbon::parse($actual));
        } else {
            $this->assertInternalType(gettype($expectedValue), $actual);
        }
    }

    /**
     * @param mixed $value
     */
    private function isValidDateFormat($value): bool
    {
        return is_string($value) && (preg_match("/\d{4}\-\d{2}-\d{2}/", $value));
    }

    public function internalTypeAndInstanceDataProvider()
    {
        return [
            ['int', 'field1', 'FunctionalEniity', 1],
            ['float', 'field1', 'FunctionalEniity', 1.0],
            ['bool', 'field1', 'FunctionalEniity', true],
            ['string', 'field1', 'FunctionalEniity', 'value'],
            ['array', 'field1', 'FunctionalEniity', []],
            ['\DateTime', 'field1', 'FunctionalEniity', new \DateTime()],
            ['\DateTimeImmutable', 'field1', 'FunctionalEniity',  new \DateTime()],
            ['\DateTimeInterface', 'field1', 'FunctionalEniity',  new \DateTime()],
        ];
    }
}
