<?php

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\ClassObjects\FieldObject;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;
use OpenClassrooms\CodeGenerator\Utility\ClassNameUtility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FieldObjectServiceImpl implements FieldObjectService
{
    use ClassNameUtility;

    /**
     * @inheritdoc
     */
    public function getParentPublicClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        return $this->getPublicClassFields($rc->getParentClass()->getName());
    }

    /**
     * @inheritdoc
     */
    public function getPublicClassFields(string $className): array
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

        return $this->buildFields($classProperties);
    }

    /**
     * @param \ReflectionProperty[] $reflectionProperties
     *
     * @return FieldObject[]
     */
    private function buildFields(array $reflectionProperties): array
    {
        $fields = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $fields[] = $this->buildField($reflectionProperty);
        }

        return $fields;
    }

    private function buildField(\ReflectionProperty $reflectionProperty): FieldObject
    {
        $field = new FieldObject($reflectionProperty->getName());
        $field->setAccessor($this->getFieldAccessor($reflectionProperty));
        $docComment = $reflectionProperty->getDocComment();
        $field->setDocComment($docComment);
        $field->setScope(FieldObject::SCOPE_PUBLIC);

        return $field;
    }

    private function getFieldAccessor(\ReflectionProperty $reflectionProperty)
    {
        $fieldName = $reflectionProperty->getName();
        $declaringClass = $reflectionProperty->getDeclaringClass();

        $accessor = 'get'.ucfirst($fieldName);
        if ($declaringClass->hasMethod($accessor)) {
            return $accessor;
        }
        $accessor = 'is'.ucfirst($fieldName);
        if ($declaringClass->hasMethod($accessor)) {
            return $accessor;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getProtectedClassFields(string $className): array
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

        return $this->buildFields($classProperties);
    }
}
