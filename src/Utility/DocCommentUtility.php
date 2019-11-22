<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class DocCommentUtility
{
    const ARRAY_TYPE = 'array';

    const DATE_TIME_INTERFACE = '\DateTimeInterface';

    public static function allowsNull(string $docComment): bool
    {
        return (bool) preg_match('/null/', $docComment);
    }

    public static function getReturnType($docComment)
    {
        if (preg_match('/@return\s\w+\[]/', $docComment)) {
            return self::ARRAY_TYPE;
        }

        return self::getType($docComment);
    }

    public static function getType(string $docComment): string
    {
        $type = preg_replace('/([\/*@]|[[:space:]]|\[])|(var)|(null\|)|(\|null)|(return)/', '', $docComment);

        return preg_match('/Date/', $docComment) ? self::DATE_TIME_INTERFACE : $type;
    }

    public static function setType(string $type): string
    {
        return "/**
     * @var $type
     */";
    }
}
