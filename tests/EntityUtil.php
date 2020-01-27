<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Tests;

class EntityUtil
{
    public static function setId($object, $id)
    {
        $property = new \ReflectionProperty(get_class($object), 'id');
        $property->setAccessible(true);
        $property->setValue($object, $id);
    }

    /**
     * @return mixed
     */
    public static function getProperty($object, $propertyName)
    {
        $property = new \ReflectionProperty(get_class($object), $propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * @return mixed
     */
    public static function setProperty($object, $propertyName, $value)
    {
        $property = new \ReflectionProperty(get_class($object), $propertyName);
        $property->setAccessible(true);
        $property->setValue($object, $value);

        return $property;
    }
}
