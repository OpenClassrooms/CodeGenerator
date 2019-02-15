<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\FileObjects\ConstObject;
use OpenClassrooms\CodeGenerator\FileObjects\FieldObject;
use OpenClassrooms\CodeGenerator\Services\FieldObjectService;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class FieldObjectServiceImpl implements FieldObjectService
{
    /**
     * {@inheritdoc}
     */
    public function getParentPublicClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        return $this->getPublicClassFields($rc->getParentClass()->getName());
    }

    /**
     * {@inheritdoc}
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
    private function buildFields(array $reflectionProperties, string $scope = FieldObject::SCOPE_PUBLIC): array
    {
        $fields = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $fields[] = $this->buildField($reflectionProperty, $scope);
        }

        return $fields;
    }

    private function buildField(\ReflectionProperty $reflectionProperty, string $scope): FieldObject
    {
        $field = new FieldObject($reflectionProperty->getName());
        $field->setAccessor($this->getFieldAccessor($reflectionProperty));
        $docComment = $reflectionProperty->getDocComment();
        $field->setDocComment($docComment);
        $field->setScope($scope);

        return $field;
    }

    private function getFieldAccessor(\ReflectionProperty $reflectionProperty)
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
     * {@inheritdoc}
     */
    public function getParentProtectedClassFields(string $className): array
    {
        $rc = new \ReflectionClass($className);

        return $this->getProtectedClassFields($rc->getParentClass()->getName());
    }

    /**
     * {@inheritdoc}
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

        return $this->buildFields($classProperties, FieldObject::SCOPE_PROTECTED);
    }
}
