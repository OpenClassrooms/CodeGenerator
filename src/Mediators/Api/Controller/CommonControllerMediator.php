<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Mediators\Api\Controller;

interface CommonControllerMediator
{
    public function mediate(array $args = [], array $options = []): array;
}
