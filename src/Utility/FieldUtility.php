<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\FileObjects\FileObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FieldUtility
{
    /**
     * @param FieldObject[]
     *
     * @return FieldObject[]
     */
    public static function generateStubFieldObjects(array $fields, $fileObject): array
    {
        $fieldObjects = [];
        foreach ($fields as $field) {
            $fieldObjects[] = self::buildStubFieldObject($field, $fileObject);
        }

        return $fieldObjects;
    }

    private static function buildStubFieldObject(FieldObject $fieldObject, FileObject $fileObject): FieldObject
    {
        $stubFieldObject = new FieldObject($fieldObject->getName());
        $stubFieldObject->setDocComment($fieldObject->getDocComment());
        $stubFieldObject->setScope($fieldObject->getScope());
        $stubFieldObject->setValue(ConstUtility::generateStubConstObject($stubFieldObject, $fileObject));

        return $stubFieldObject;
    }
}
