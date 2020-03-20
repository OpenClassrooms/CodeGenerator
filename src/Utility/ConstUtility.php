<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\ConstObject;
use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

class ConstUtility
{
    /**
     * @return ConstObject[]
     */
    public static function generateConstsFromStubFileObject(FileObject $fileObject, string $type = null): array
    {
        $constObjects = [];
        $stubIndex = StubSuffixUtility::getStubIndex($fileObject);
        foreach ($fileObject->getFields() as $field) {
            $constObject = new ConstObject($field->getName());
            $constObject->setValue(
                $fileObject->getEntity() . $type . $stubIndex . '::' . $constObject->getName()
            );
            $constObjects[] = $constObject;
        }

        return $constObjects;
    }

    /**
     * @return ConstObject[]
     */
    public static function generatePatchModelConsts(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $reflectionProperties */
        $reflectionProperties = $rc->getProperties(\ReflectionProperty::IS_PROTECTED);
        $constObjects = [];
        foreach ($reflectionProperties as $field) {
            if ($field->getDeclaringClass()->getName() === $className && FieldUtility::isUpdatable($field->getName())) {
                $constObjects[] = self::buildPatchConst($field);
            }
        }

        return $constObjects;
    }

    private static function buildPatchConst(\ReflectionProperty $field): ConstObject
    {
        $constObject = new ConstObject(NameUtility::createPatchEntityModelConstantName($field));
        $constObject->setValue($field->getName());

        return $constObject;
    }
}
