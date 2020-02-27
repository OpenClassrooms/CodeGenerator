<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class StubFieldUtility
{
    /**
     * @param FieldObject[]
     *
     * @return FieldObject[]
     */
    public static function generateStubFieldObjects(array $fields): array
    {
        $fieldObjects = [];
        foreach ($fields as $field) {
            $fieldObjects[] = self::buildStubFieldObject($field);
        }

        return $fieldObjects;
    }

    private static function buildStubFieldObject(FieldObject $fieldObject): FieldObject
    {
        $stubFieldObject = new FieldObject($fieldObject->getName());
        $stubFieldObject->setDocComment($fieldObject->getDocComment());
        $stubFieldObject->setScope($fieldObject->getScope());

        return $stubFieldObject;
    }
}
