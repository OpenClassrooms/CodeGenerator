<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

use OpenClassrooms\CodeGenerator\Mediators\ClassType;

class RoutingUtility
{
    public static function create(string $baseNamespace, string $domain, string $entity, string $method): string
    {
        $routeName = self::buildName($baseNamespace, $domain, $entity, $method);
        $resource = self::buildResourceName($entity);
        [$id, $requirements] = self::buildIdAndRequirement($entity, $method);
        $method = self::getMethod($method);

        return '"/' . $resource . $id . '", name="' . $routeName . '", methods={"' . $method . '"}' . $requirements;
    }

    public static function buildName(string $baseNamespace, string $domain, string $entity, string $method): string
    {
        return strtolower(
            str_replace(
                ['\\', '-'],
                ['_', '_'],
                $baseNamespace . 'api' . StringUtility::convertToLowerSnakeCase(self::getSubDomain($domain))
                . '_' . StringUtility::convertToLowerSnakeCase($entity) . '_' . $method
            )
        );
    }

    private static function getSubDomain(string $domain)
    {
        return preg_replace('/.+?(?=\\\\)/', '', $domain);
    }

    private static function buildResourceName(string $entity): string
    {
        return StringUtility::convertToLowerHyphenated(StringUtility::pluralize($entity));
    }

    private static function buildIdAndRequirement(string $entity, string $method): array
    {
        $id = null;
        $requirements = null;

        if (in_array($method, [ClassType::GET, ClassType::PATCH, ClassType::PUT, ClassType::DELETE])) {
            $id = NameUtility::createEntityIdName($entity);
            $requirements = ', requirements={"' . $id . '"="^\d{1,9}$"}';
            $id = '/{' . $id . '}';
        }

        return [$id, $requirements];
    }

    private static function getMethod(string $method): string
    {
        return strtoupper(explode('-', $method)[0]);
    }
}
