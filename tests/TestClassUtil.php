<?php

namespace OpenClassrooms\CodeGenerator\Tests;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class TestClassUtil
{
    /**
     * @return mixed
     */
    public static function setProperty($propertyName, $value, $object)
    {
        $property = new \ReflectionProperty(get_class($object), $propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $value);

        return $property;
    }

    public static function getConstants($className)
    {
        $reflectionClass = new \ReflectionClass($className);

        return $reflectionClass->getConstants();
    }

    public static function getShortClassName(string $className)
    {
        $rc = new \ReflectionClass($className);

        return $rc->getShortName();
    }
}
