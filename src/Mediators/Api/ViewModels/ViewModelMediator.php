<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api;

interface ViewModelMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
