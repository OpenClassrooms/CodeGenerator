<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility\Impl;

use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtility as Utility;
use OpenClassrooms\CodeGenerator\Utility\FieldObjectUtilityStrategy;

final class FieldObjectUtilityGetFieldsUpdatable implements FieldObjectUtilityStrategy
{
    public function getFields(string $className): array
    {
        $fields = Utility::getProtectedClassFields($className);

        foreach ($fields as $key => $field) {
            if (in_array($field->getName(), ['id', 'createdAt', 'updatedAt'])) {
                unset($fields[$key]);
            }
        }

        return $fields;
    }
}
