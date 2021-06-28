<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use Carbon\Carbon;
use Faker\Provider\Base;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;
use OpenClassrooms\CodeGenerator\Utility\StubUtilityStrategy;

final class StubUtilityGetRandomValue implements StubUtilityStrategy
{
    private const QUOTE = "'";

    /**
     * @return mixed
     */
    public function createFakeValue(string $type, string $fieldName, string $entityName)
    {
        switch ($type) {
            case 'int' :
                return random_int(1, 999999);
            case 'float' :
                return Base::randomFloat();
            case 'bool' :
                return true;
            case 'string' :
                return self::QUOTE . StringUtility::convertToSpacedString($entityName . ' ' . $fieldName) . self::QUOTE;
            case 'array' :
                $value = StringUtility::convertToSpacedString($entityName . ' ' . $fieldName);

                return [$value . " 1", $value . " 2"];
            case '\DateTime' :
            case '\DateTimeImmutable' :
            case '\DateTimeInterface' :
                return Carbon::now();
            case StringUtility::isObject($type):
                return self::QUOTE . StringUtility::convertToSpacedString(
                    $entityName . ' ' . $fieldName
                ) . 'object' . self::QUOTE;
            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
