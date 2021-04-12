<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility as Utility;

class FieldUtility
{
    public static function getFields(string $entityClassName, array $wantedFields = []): array
    {
        $fields = self::getEntityFields($entityClassName);

        if (empty($wantedFields)) {
            return $fields;
        }

        $validatedFields = array_intersect($fields, $wantedFields);

        if (count($validatedFields) !== count($wantedFields)) {
            throw new \Exception(
                "Some wanted fields doesn't exist in $entityClassName: " . implode(
                    ',',
                    array_diff($validatedFields, $wantedFields)
                )
            );
        }

        return $validatedFields;
    }

    /**
     * @return string[]
     */
    private static function getEntityFields(string $entityClassName): array
    {
        return array_map(
            static fn (FieldObject $fieldObject) => $fieldObject->getName(),
            FieldObjectUtility::getProtectedClassFields($entityClassName)
        );
    }

    /**
     * @return FieldObject[]
     */
    public static function getFieldsUpdatable(string $className): array
    {
        $fields = Utility::getProtectedClassFields($className);

        foreach ($fields as $key => $field) {
            if (!self::isUpdatable($field->getName())) {
                unset($fields[$key]);
            }
        }

        return $fields;
    }

    public static function isUpdatable(string $fieldName): bool
    {
        return !in_array($fieldName, ['id', 'createdAt', 'updatedAt']);
    }
}
