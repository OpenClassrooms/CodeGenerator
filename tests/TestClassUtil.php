<?php

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
}
