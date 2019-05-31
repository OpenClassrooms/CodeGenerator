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
        $type = self::getType($docComment);
        if (preg_match('/\[]/', $type)) {
            return self::ARRAY_TYPE;
        }

        if (self::allowsNull($docComment)) {
            return preg_replace('/(null\|)|(\|null)/', '', $type);
        }

        return $type;
    }

    public static function getType(string $docComment): string
    {
        return preg_replace('/([\/*@]|[[:space:]]|\[])|(var)|(return)/', '', $docComment);
    }

    public static function allowsNull(string $docComment): bool
    {
        return (bool) preg_match('/null/', $docComment);
    }
}
