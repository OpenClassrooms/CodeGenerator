<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services\Impl;

use OpenClassrooms\CodeGenerator\Mediators\ClassType;
use OpenClassrooms\CodeGenerator\Services\RoutingFactoryService;
use OpenClassrooms\CodeGenerator\Utility\NameUtility;
use OpenClassrooms\CodeGenerator\Utility\StringUtility;

class RoutingFactoryServiceImpl implements RoutingFactoryService
{
    /**
     * @var string
     */
    private $baseNamespace;

    public function create(string $domain, string $entity, string $method): string
    {
        $subDomain = $this->getSubDomain($domain);
        $routeName = $this->buildName($entity, $method, $subDomain);
        $resource = $this->buildRessourceName($entity);
        [$id, $requirements] = $this->buildIdAndRequirement($entity, $method);
        $method = $this->getMethod($method);

        return '"/' . $resource . $id . '", name="' . $routeName . '", methods={"' . $method . '"}' . $requirements;
    }

    protected function getSubDomain(string $domain)
    {
        return preg_replace('/.+?(?=\\\\)/', '', $domain);
    }

    protected function buildName(string $entity, string $method, $subDomain): string
    {
        return strtolower(
            str_replace(
                ['\\', '-'],
                ['_', '_'],
                $this->baseNamespace . 'api' . StringUtility::convertToLowerSnakeCase($subDomain)
                . '_' . StringUtility::convertToLowerSnakeCase($entity) . '_' . $method
            )
        );
    }

    protected function buildRessourceName(string $entity): string
    {
        return StringUtility::convertToLowerHyphenated(StringUtility::pluralize($entity));
    }

    protected function buildIdAndRequirement(string $entity, string $method): array
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

    protected function getMethod(string $method): string
    {
        return strtoupper(explode('-', $method)[0]);
    }

    public function setBaseNamespace(string $baseNamespace): void
    {
        $this->baseNamespace = $baseNamespace;
    }
}
