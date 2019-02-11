<?php declare(strict_types=1);

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

    public static function getProperty($propertyName, $object)
    {
        $property = new \ReflectionProperty(get_class($object), $propertyName);
        $property->setAccessible(true);

        return $property->getValue($propertyName);
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

    public static function invokeMethod($methodName, $object, $args = null)
    {
        $method = new \ReflectionMethod(get_class($object), $methodName);
        $method->setAccessible(true);

        return null === $args ? $method->invoke($object) :  $method->invoke($object, $args);
    }
}
