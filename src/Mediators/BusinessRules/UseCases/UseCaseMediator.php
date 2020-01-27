<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases;

interface UseCaseMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
