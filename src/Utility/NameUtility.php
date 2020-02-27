<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

class NameUtility
{
    public static function createChainedEntityIdMethodName(string $shortClassName): string
    {
        return 'with' . ucfirst($shortClassName) . 'Id';
    }

    public static function createIsUpdatedName(\ReflectionProperty $field): string
    {
        return 'is' . ucfirst($field->getName()) . 'Updated';
    }

    public static function createMethodsChainedName(\ReflectionProperty $field): string
    {
        return 'with' . ucfirst($field->getName());
    }

    public static function createEntityIdName(string $shortClassName): string
    {
        return lcfirst($shortClassName) . 'Id';
    }

    public static function createUpdatedName(\ReflectionProperty $field): string
    {
        return $field->getName() . 'Updated';
    }

    public static function creatGetEntityIdName(string $shortClassName): string
    {
        return 'get' . ucfirst($shortClassName) . 'Id';
    }

    public static function createGetEntityName(string $shortClassName): string
    {
        return 'get' . ucfirst($shortClassName);
    }

    public static function createUpdateEntityMethodName(string $shortClassName): string
    {
        return 'update' . $shortClassName;
    }

    public static function createCreateEntityMethodName(string $shortClassName): string
    {
        return 'create' . $shortClassName;
    }

    public static function createEntityStubName(string $shortClassName): string
    {
        return lcfirst($shortClassName) . 'Stub';
    }

    public static function createPatchEntityModelConstantName(\ReflectionProperty $field): string
    {
        return StringUtility::convertToUpperSnakeCase($field->getName()) . '_API_FIELD_NAME';
    }
}
