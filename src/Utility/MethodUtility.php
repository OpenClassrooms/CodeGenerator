<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\Object\FieldObject;
use OpenClassrooms\CodeGenerator\Entities\Object\MethodObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class MethodUtility
{
    /**
     * @param string[] $fields
     *
     * @return MethodObject[]
     */
    public static function getSelectedAccessors(string $className, array $fields = []): array
    {
        $methods = self::getAccessors($className);

        $methods = self::removeNotSelectedFields($fields, $methods);

        return $methods;
    }

    /**
     * @param string[] $fields
     */
    public static function getAccessors(string $className): array
    {
        $rc = new \ReflectionClass($className);
        $methods = $rc->getMethods();

        $accessors = [];
        foreach ($methods as $key => $method) {
            if (self::isAccessor($method)) {
                $accessors[] = self::buildAccessor($method);
            }
        }

        return $accessors;
    }

    private static function isAccessor(\ReflectionMethod $method): bool
    {
        return ('get' === substr($method->getName(), 0, 3) || 'is' === substr($method->getName(), 0, 2));
    }

    private static function buildAccessor(\ReflectionMethod $method): MethodObject
    {
        if (null !== $method->getReturnType()) {
            return self::buildAccessorFromReturnType($method);
        }

        if (false !== $method->getDocComment()) {
            return self::buildAccessorFromDocType($method);
        }

        throw new \Exception("{$method->class}::{$method->getName()} return value is not typed");
    }

    private static function buildAccessorFromReturnType(\ReflectionMethod $method): MethodObject
    {
        $accessor = new MethodObject($method->getName());
        $accessor->setDocComment($method->getDocComment());
        $accessor->setReturnType($method->getReturnType()->getName());
        $accessor->setNullable($method->getReturnType()->allowsNull());

        return $accessor;
    }

    private static function buildAccessorFromDocType(\ReflectionMethod $method): MethodObject
    {
        $accessor = new MethodObject($method->getName());
        $accessor->setDocComment($method->getDocComment());
        $accessor->setReturnType(DocCommentUtility::getReturnType($method->getDocComment()));
        $accessor->setNullable(DocCommentUtility::allowsNull($method->getDocComment()));

        return $accessor;
    }

    /**
     * @param string[]
     * @param \ReflectionMethod[]
     *
     * @return array
     */
    private static function removeNotSelectedFields(array $fields, array $methods): array
    {
        foreach ($methods as $key => $method) {
            if (!in_array($method->getFieldName(), $fields)) {
                unset($methods[$key]);
            }
        }

        return array_values($methods);
    }

    public static function buildMethodsChained(string $className, string $returnType): array
    {
        $rc = new \ReflectionClass($className);

        $methodsChained = [];
        foreach ($rc->getProperties() as $field) {
            if ($field->getName() === 'id') {
                continue;
            }
            $methodsChained[] = self::buildMethodObject($returnType, $field);
        }

        return $methodsChained;
    }

    private static function buildMethodObject(string $returnType, \ReflectionProperty $field): MethodObject
    {
        $methodChained = new MethodObject(self::createMethodsChainedName($field));
        $methodChained->setReturnType($returnType);
        $methodChained->setArguments(self::buildArguments($field));

        return $methodChained;
    }

    private static function createMethodsChainedName(\ReflectionProperty $field): string
    {
        return 'with' . ucfirst($field->getName());
    }

    private static function buildArguments(\ReflectionProperty $field): array
    {
        $argument = new FieldObject($field->getName());
        $argument->setDocComment($field->getDocComment());

        return [$argument];
    }

    public static function createArgumentNameFromMethod(string $method): ?string
    {
        if ('get' === substr($method, 0, 3)) {
            return lcfirst(substr($method, 3));
        }
        if ('is' === substr($method, 0, 2)) {
            return lcfirst(substr($method, 2));
        }

        return null;
    }
}
