<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FieldObjectUtility
{
    /**
     * @return FieldObject[]
     */
    public static function getParentPublicClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        return self::getPublicClassFields($rc->getParentClass()->getName());
    }

    /**
     * @return FieldObject[]
     */
    public static function getPublicClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $reflectionProperties */
        $reflectionProperties = $rc->getProperties(\ReflectionProperty::IS_PUBLIC);
        $classProperties = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            if ($reflectionProperty->getDeclaringClass()->getName() === $className) {
                $classProperties[] = $reflectionProperty;
            }
        }

        return self::buildFields($classProperties);
    }

    /**
     * @param \ReflectionProperty[] $reflectionProperties
     *
     * @return FieldObject[]
     */
    private static function buildFields(array $reflectionProperties, string $scope = FieldObject::SCOPE_PUBLIC): array
    {
        $fields = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $fields[] = self::buildField($reflectionProperty, $scope);
        }

        return $fields;
    }

    private static function buildField(\ReflectionProperty $reflectionProperty, string $scope): FieldObject
    {
        $field = new FieldObject($reflectionProperty->getName());
        $field->setAccessor(self::getFieldAccessor($reflectionProperty));
        $docComment = $reflectionProperty->getDocComment();
        $field->setDocComment($docComment);
        $field->setScope($scope);

        return $field;
    }

    private static function getFieldAccessor(\ReflectionProperty $reflectionProperty)
    {
        $fieldName = $reflectionProperty->getName();
        $declaringClass = $reflectionProperty->getDeclaringClass();

        $accessor = 'get' . ucfirst($fieldName);
        if ($declaringClass->hasMethod($accessor)) {
            return $accessor;
        }
        $accessor = 'is' . ucfirst($fieldName);
        if ($declaringClass->hasMethod($accessor)) {
            return $accessor;
        }

        return null;
    }

    /**
     * @return FieldObject[]
     */
    public static function getProtectedClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $reflectionProperties */
        $reflectionProperties = $rc->getProperties(\ReflectionProperty::IS_PROTECTED);
        $classProperties = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            if ($reflectionProperty->getDeclaringClass()->getName() === $className) {
                $classProperties[] = $reflectionProperty;
            }
        }

        return self::buildFields($classProperties, FieldObject::SCOPE_PROTECTED);
    }
}
