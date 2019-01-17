<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Samuel Gomis <gomis.samuel@external.openclassrooms.com>
 */
class MethodUtility
{
    public static function getListItemTestCaseAssertMethod(array $methods)
    {
        foreach ($methods as $method) {
            if (strpos($method->getName(), 'ListItem') !== false) {
                return $method->getName();
            }
        }

        throw new \Exception('Method not found');
    }

    public static function getDetailTestCaseAssertMethod(array $methods)
    {
        foreach ($methods as $method) {
            if (strpos($method->getName(), 'Detail') !== false) {
                return $method->getName();
            }
        }

        throw new \Exception('Method not found');
    }

    public static function getAssertMethods($className): array
    {
        $class = new \ReflectionClass($className);
        $methods = $class->getMethods(\ReflectionMethod::IS_PROTECTED | \ReflectionMethod::IS_PUBLIC);

        return $methods;
    }
}
