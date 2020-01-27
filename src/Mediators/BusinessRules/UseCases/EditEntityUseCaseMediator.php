<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\BusinessRules\UseCases;

interface EditEntityUseCaseMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
