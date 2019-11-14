<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class FieldObjectUtility
{
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
        $field->setDocComment($reflectionProperty->getDocComment());
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
            if ($reflectionProperty->getDeclaringClass()->getName() === $className &&
                !self::isTraitsProperty($rc->getTraitNames(), $reflectionProperty)
            ) {
                $classProperties[] = $reflectionProperty;
            }
        }

        return self::buildFields($classProperties, FieldObject::SCOPE_PROTECTED);
    }

    /**
     * @return FieldObject[]
     */
    public static function getPublicClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);
        /** @var \ReflectionProperty[] $rcProperties */
        $rcProperties = $rc->getProperties(\ReflectionProperty::IS_PUBLIC);
        $classProperties = [];
        foreach ($rcProperties as $rcProperty) {
            if ($rcProperty->getDeclaringClass()->getName() === $className &&
                !self::isTraitsProperty($rc->getTraitNames(), $rcProperty)
            ) {
                $classProperties[] = $rcProperty;
            }
        }

        return self::buildFields($classProperties);
    }

    /**
     * @return FieldObject[]
     */
    private static function getPublicTraitFields(string $traitName): array
    {
        $rc = new \ReflectionClass($traitName);
        /** @var \ReflectionProperty[] $traitProperties */
        $traitProperties = $rc->getProperties(\ReflectionProperty::IS_PUBLIC);
        $properties = [];
        foreach ($traitProperties as $traitProperty) {
            if ($traitProperty->getDeclaringClass()->getName() === $traitName) {
                $properties[] = $traitProperty;
            }
        }

        return self::buildFields($properties);
    }

    /**
     * @return FieldObject[]
     */
    public static function getPublicTraitsFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        $traitFields = [];
        foreach ($rc->getTraitNames() as $traitName) {
            $traitFields = self::getPublicTraitFields($traitName);
        }
        return $traitFields;
    }

    private static function isTraitProperty(string $traitName, \ReflectionProperty $reflectionProperty): bool
    {
        /** @var FieldObject[] $traitProperties */
        $traitProperties = self::getPublicTraitFields($traitName);

        foreach ($traitProperties as $traitProperty) {
            if ($traitProperty->getName() === $reflectionProperty->getName()) {
                return true;
            }
        }

        return false;
    }

    private static function isTraitsProperty(array $traitNames, \ReflectionProperty $reflectionProperty): bool
    {
        foreach ($traitNames as $traitName) {
            if (self::isTraitProperty($traitName, $reflectionProperty)) {
                return true;
            }
        }

        return false;
    }
}
