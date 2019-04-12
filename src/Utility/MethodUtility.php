<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\MethodObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class MethodUtility
{
    public static function getAccessors(string $className): array
    {
        $rc = new \ReflectionClass($className);
        $methods = $rc->getMethods();

        $accessors = [];
        foreach ($methods as $method) {
            if (self::isAccessor($method)) {
                $accessors[] = $method->getName();
            }
        }

        return self::buildAccessors($accessors);
    }

    private static function isAccessor(\ReflectionMethod $method): bool
    {
        return ('get' === substr($method->getName(), 0, 3) || 'is' === substr($method->getName(), 0, 2));
    }

    private static function buildAccessors(array $accessors): array
    {
        $methods = [];
        foreach ($accessors as $accessor) {
            $methods[] = new MethodObject($accessor);
        }

        return $methods;
    }

    /**
     * @param MethodObject[]
     */
    public static function getMethodName(array $methods): string
    {
        return array_shift($methods)->getName();
    }

    /**
     * @return string|null
     */
    public static function createArgumentNameFromMethod(string $method)
    {
        if ('get' === substr($method, 0, 3)) {
            return lcfirst(substr($method, 3));
        }
        if ('is' == substr($method, 0, 3)) {
            return lcfirst(substr($method, 2));
        }

        return null;
    }
}
