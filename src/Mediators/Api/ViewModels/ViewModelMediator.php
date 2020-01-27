<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\ViewModels;

interface ViewModelMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
