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
        $scope = FieldObject::SCOPE_PUBLIC;

        return new FieldObject(
            $reflectionProperty->getName(),
            $reflectionProperty->getDocComment(),
            $scope
        );
    }
}
