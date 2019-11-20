<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class NameUtility
{
    public static function creatGetEntityIdName(string $shortClassName): string
    {
        return 'get' . ucfirst($shortClassName) . 'Id';
    }

    public static function creatEntityIdName(string $shortClassName): string
    {
        return lcfirst($shortClassName) . 'Id';
    }

    public static function createIsUpdatedName(\ReflectionProperty $field): string
    {
        return 'is' . ucfirst($field->getName()) . 'Updated';
    }

    public static function createUpdatedName(\ReflectionProperty $field): string
    {
        return $field->getName() . 'Updated';
    }

    public static function createMethodsChainedName(\ReflectionProperty $field): string
    {
        return 'with' . ucfirst($field->getName());
    }
}
