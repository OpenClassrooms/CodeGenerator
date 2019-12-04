<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use Doctrine\Common\Inflector\Inflector;

class StringUtility
{
    public static function convertToLowerSnakeCase(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)(?<!\\\\)[A-Z0-9]/', '_$0', $string));
    }

    public static function convertToSpacedString(string $string): string
    {
        return preg_replace('/(?<!^)[A-Z0-9]/', ' $0', $string);
    }

    public static function convertToUpperSnakeCase(string $string): string
    {
        return strtoupper(preg_replace('/(?<!^)[A-Z0-9]/', '_$0', $string));
    }

    public static function isObject(string $string)
    {
        return (bool) preg_match('/([A-Z][a-z0-9]+)+/', $string);
    }

    public static function pluralize(string $string): string
    {
        return Inflector::pluralize($string);
    }
}
