<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Entities\MethodObject;

/**
 * @author Samuel Gomis <samuel.gomis@external.openclassrooms.com>
 */
class MethodUtility
{
    const DOC_COMMENT = 'doc_comment';

    const NAME = 'name';

    const NULLABLE = 'nullable';

    const RETURN_TYPE = 'return_type';

    /**
     * @param string[] $fields
     *
     * @return MethodObject[]
     */
    public static function getSelectedAccessors(string $className, array $fields): array
    {
        $methods = self::getAccessors($className);

        foreach ($methods as $key => $method) {
            if (!in_array($method->getFieldName(), $fields)) {
                unset($methods[$key]);
            }
        }

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
                $accessors = self::buildAccessorsArray($method, $accessors, $key);
            }
        }

        return self::buildAccessors($accessors);
    }

    private static function isAccessor(\ReflectionMethod $method): bool
    {
        return ('get' === substr($method->getName(), 0, 3) || 'is' === substr($method->getName(), 0, 2));
    }

    private static function buildAccessorsArray(\ReflectionMethod $method, array $accessors, int $key): array
    {
        $accessors[$key][self::DOC_COMMENT] = $method->getDocComment();
        $accessors[$key][self::NAME] = $method->getName();
        if (null !== $method->getReturnType()) {
            $accessors[$key][self::RETURN_TYPE] = $method->getReturnType()->getName();
            $accessors[$key][self::NULLABLE] = $method->getReturnType()->allowsNull();
        } else {
            $accessors[$key][self::RETURN_TYPE] = DocCommentUtility::getReturnType($method->getDocComment());
            $accessors[$key][self::NULLABLE] = DocCommentUtility::allowsNull($method->getDocComment());
        }

        return $accessors;
    }

    /**
     * @return MethodObject[]
     */
    private static function buildAccessors(array $accessors): array
    {
        $methods = [];
        foreach ($accessors as $accessor) {
            $method = new MethodObject($accessor[self::NAME]);
            $method->setDocComment($accessor[self::DOC_COMMENT]);
            $method->setReturnType($accessor[self::RETURN_TYPE]);
            $method->setNullable($accessor[self::NULLABLE]);
            $methods[] = $method;
        }

        return $methods;
    }

    /**
     * @return string|null
     */
    public static function createArgumentNameFromMethod(string $method)
    {
        if ('get' === substr($method, 0, 3)) {
            return lcfirst(substr($method, 3));
        }
        if ('is' == substr($method, 0, 2)) {
            return lcfirst(substr($method, 2));
        }

        return null;
    }
}
