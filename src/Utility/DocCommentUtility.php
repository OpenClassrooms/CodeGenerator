<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class DocCommentUtility
{
    const ARRAY_TYPE = 'array';

    public static function getReturnType($docComment)
    {
        if (preg_match('/@return\s\w+\[]/', $docComment)) {
            return self::ARRAY_TYPE;
        }

        return self::getType($docComment);
    }

    public static function getType(string $docComment): string
    {
        return preg_replace('/([\/*@]|[[:space:]]|\[])|(var)|(null\|)|(\|null)|(return)/', '', $docComment);
    }

    public static function allowsNull(string $docComment): bool
    {
        return (bool) preg_match('/null/', $docComment);
    }
}
