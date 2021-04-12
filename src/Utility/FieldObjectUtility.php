<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;

class FieldObjectUtility
{
    public static function buildEntityIdMethodObject(string $shortClassName): FieldObject
    {
        $methodChained = new FieldObject(NameUtility::createEntityIdName($shortClassName));
        $methodChained->setDocComment(DocCommentUtility::setType('int'));
        $methodChained->setScope(FieldObject::SCOPE_PUBLIC);

        return $methodChained;
    }

    /**
     * @return FieldObject[]
     */
    public static function buildIsUpdatedFields(
        string $className,
        string $defaultValue = 'false',
        string $scope = FieldObject::SCOPE_PUBLIC
    ): array {
        $rc = new \ReflectionClass($className);

        $fields = [];
        foreach ($rc->getProperties() as $field) {
            if (FieldUtility::isUpdatable($field->getName())) {
                $fields[] = self::buildUpdatedField($field, $defaultValue, $scope);
            }
        }

        return $fields;
    }

    public static function fixObjectType(string $type): string
    {
        if (in_array($type, ['DateTime', 'DateTimeImmutable', 'DateTimeInterface'])) {
            return '\\' . $type;
        }

        return $type;
    }

    private static function buildUpdatedField(
        \ReflectionProperty $field,
        string $defaultValue,
        string $scope
    ): FieldObject {
        $field = new FieldObject(NameUtility::createUpdatedName($field), 'bool');
        $field->setDocComment(DocCommentUtility::setType('bool'));
        $field->setScope($scope);
        $field->setValue($defaultValue);

        return $field;
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
        foreach ($reflectionProperties as $field) {
            if ($field->getDeclaringClass()->getName() === $className &&
                !self::isTraitsProperty($rc->getTraitNames(), $field)
            ) {
                $classProperties[] = $field;
            }
        }

        return self::buildFields($classProperties, FieldObject::SCOPE_PROTECTED);
    }

    private static function isTraitsProperty(array $traitNames, \ReflectionProperty $field): bool
    {
        foreach ($traitNames as $traitName) {
            if (self::isTraitProperty($traitName, $field)) {
                return true;
            }
        }

        return false;
    }

    private static function isTraitProperty(string $traitName, \ReflectionProperty $field): bool
    {
        /** @var FieldObject[] $traitProperties */
        $traitProperties = self::getPublicTraitFields($traitName);

        foreach ($traitProperties as $traitProperty) {
            if ($traitProperty->getName() === $field->getName()) {
                return true;
            }
        }

        return false;
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
     * @param \ReflectionProperty[] $reflectionProperties
     *
     * @return FieldObject[]
     */
    private static function buildFields(array $reflectionProperties, string $scope = FieldObject::SCOPE_PUBLIC): array
    {
        $fields = [];
        foreach ($reflectionProperties as $field) {
            $fields[] = self::buildField($field, $scope);
        }

        return $fields;
    }

    private static function buildField(\ReflectionProperty $field, string $scope): FieldObject
    {
        $fieldType = $field->getType();
        $fieldObject = new FieldObject($field->getName(), $fieldType ? $fieldType->getName() : null);
        $fieldObject->setAccessor(self::getFieldAccessor($field));
        $fieldObject->setDocComment($field->getDocComment() ?: null);
        $fieldObject->setScope($scope);

        return $fieldObject;
    }

    private static function getFieldAccessor(\ReflectionProperty $field): ?string
    {
        $fieldName = $field->getName();
        $declaringClass = $field->getDeclaringClass();

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
    public static function getPublicTraitsFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        $traitFields = [];
        foreach ($rc->getTraitNames() as $traitName) {
            $traitFields = self::getPublicTraitFields($traitName);
        }

        return $traitFields;
    }
}
