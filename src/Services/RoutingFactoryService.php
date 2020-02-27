<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Services;

interface RoutingFactoryService
{
    public function create(string $domain, string $entity, string $method): string;
}
