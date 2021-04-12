<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

class DocCommentUtility
{
    public const ARRAY_TYPE          = 'array';

    public const DATE_TIME_INTERFACE = '\DateTimeInterface';

    public static function allowsNull(string $docComment): bool
    {
        return (bool) preg_match('/null/', $docComment);
    }

    public static function getReturnType(?string $docComment): ?string
    {
        if (preg_match('/@return\s\w+\[]/', $docComment)) {
            return self::ARRAY_TYPE;
        }

        return self::getType($docComment);
    }

    public static function getType(?string $docComment): ?string
    {
        if ($docComment === null) {
            return null;
        }

        $type = self::getInternalTypeNameFromDocComment($docComment);

        if (preg_match('/Date/', $docComment)) {
            return self::DATE_TIME_INTERFACE;
        }

        if (preg_match('/@var\s\w+\[]/', $docComment)) {
            return self::ARRAY_TYPE;
        }

        return $type;
    }

    public static function getInternalTypeNameFromDocComment(string $docComment): string
    {
        return preg_replace('/([\/*@]|[[:space:]]|\[])|(var)|(null\|)|(\|null)|(return)/', '', $docComment);
    }

    public static function setType(string $type): string
    {
        return "/**
     * @var $type
     */";
    }
}
