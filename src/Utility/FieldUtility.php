<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
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
        $fields = array_map(
            function (FieldObject $fieldObject) {
                return $fieldObject->getName();
            },
            FieldObjectUtility::getProtectedClassFields($entityClassName)
        );

        return $fields;
    }

    public static function isUpdatable(\ReflectionProperty $field): bool
    {
        return !in_array($field->getName(), ['id', 'createdAt', 'updatedAt']);
    }
}
