<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\Requestors;

interface GenericUseCaseRequestMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
