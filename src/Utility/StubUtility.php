<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use Carbon\Carbon;
use Faker\Provider\Base;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class StubUtility
{
    private const BOOL = true;

    private const DEFAULT_DATE = '2018-01-01';

    private const QUOTE = "'";

    public static function createFakeValue(string $type, string $fieldName, string $entityName)
    {
        switch ($type) {
            case 'int' :
                return 1;
            case 'float' :
                return Base::randomFloat();
            case 'bool' :
                return self::BOOL;
            case 'string' :
                return self::QUOTE . StringUtility::convertToSpacedString($entityName . ' ' . $fieldName) . self::QUOTE;
            case 'array' :
                $value = StringUtility::convertToSpacedString($entityName . ' ' . $fieldName);

                return [$value . " 1", $value . " 2"];
            case '\DateTime' :
            case '\DateTimeImmutable' :
            case '\DateTimeInterface' :
                return Carbon::createFromFormat('Y-m-d', self::DEFAULT_DATE)->toDateString();
            default:
                throw new \InvalidArgumentException($type);
        }
    }
}
