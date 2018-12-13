<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
trait StringUtility
{
    public static function convertToSpacedString(string $string): string
    {
        return preg_replace('/(?<!^)[A-Z0-9]/', ' $0', $string);
    }

    public static function convertToUpperSnakeCase(string $string): string
    {
        return strtoupper(preg_replace('/(?<!^)[A-Z0-9]/', '_$0', $string));
    }

    public static function isValidConstantName(string $string): bool
    {
        return (bool) preg_match('/(([A-Z_][A-Z0-9_]*)|(__.*__))$/', $string);
    }
}
